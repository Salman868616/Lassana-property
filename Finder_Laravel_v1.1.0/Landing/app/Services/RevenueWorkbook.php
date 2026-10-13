<?php
namespace App\Services;

use ZipArchive;
use RuntimeException;

/** Writes the revenue ledger as a typed, formatted Office Open XML workbook. */
class RevenueWorkbook
{
    private static function text(string $value): string
    {
        $value = preg_replace('/[^\x{0009}\x{000A}\x{000D}\x{0020}-\x{D7FF}\x{E000}-\x{FFFD}\x{10000}-\x{10FFFF}]/u', '', $value) ?? '';
        return htmlspecialchars(mb_substr($value, 0, 32767), ENT_XML1 | ENT_QUOTES, 'UTF-8');
    }

    public static function write(iterable $rows, string $destination): void
    {
        $sheet = tempnam(sys_get_temp_dir(), 'lp-sheet-');
        if ($sheet === false) throw new RuntimeException('Unable to create report.');
        $zip = new ZipArchive;
        try {
            $xml = new \XMLWriter;
            if (!$xml->openUri($sheet)) throw new RuntimeException('Unable to write report.');
            $xml->startDocument('1.0', 'UTF-8');
            $xml->startElement('worksheet');
            $xml->writeAttribute('xmlns', 'http://schemas.openxmlformats.org/spreadsheetml/2006/main');
            $xml->writeRaw('<sheetViews><sheetView workbookViewId="0" showGridLines="0"><pane ySplit="1" topLeftCell="A2" activePane="bottomLeft" state="frozen"/></sheetView></sheetViews>');
            $xml->writeRaw('<cols>');
            foreach ([25,23,22,20,12,24,22,16,24,50,50] as $i=>$width) {
                $col=$i+1;
                $xml->writeRaw('<col min="'.$col.'" max="'.$col.'" width="'.$width.'" customWidth="1"/>');
            }
            $xml->writeRaw('</cols><sheetData>');
            $headers=['Receipt reference','Property','Type','Amount','Currency','Paid on (Sri Lanka)','Method','Status','Recorded by','Notes','Void reason'];
            $writeRow = function (array $values, int $number, bool $header=false) use ($xml) {
                $xml->writeRaw('<row r="'.$number.'" ht="'.($header ? 32 : 44).'" customHeight="1">');
                foreach ($values as $i=>$value) {
                    $ref=chr(65+$i).$number;
                    $style=$header ? 1 : ($i===3 ? 3 : ($i===5 ? 4 : 2));
                    if (!$header && in_array($i,[3,5],true)) {
                        if (!is_numeric($value)) throw new RuntimeException('Invalid numeric report value.');
                        $xml->writeRaw('<c r="'.$ref.'" s="'.$style.'"><v>'.self::text((string)$value).'</v></c>');
                    } else {
                        // Explicit text cells preserve identifiers and never execute user-entered formulas.
                        $xml->writeRaw('<c r="'.$ref.'" s="'.$style.'" t="inlineStr"><is><t xml:space="preserve">'.self::text((string)$value).'</t></is></c>');
                    }
                }
                $xml->writeRaw('</row>');
            };
            $writeRow($headers,1,true);
            $number=1;
            foreach ($rows as $row) {
                if (++$number>1048576) throw new RuntimeException('Too many payments. Narrow the report dates.');
                $writeRow($row,$number);
            }
            $xml->writeRaw('</sheetData><autoFilter ref="A1:K'.$number.'"/>');
            $xml->endElement(); $xml->endDocument(); $xml->flush(); unset($xml);
            if ($zip->open($destination,ZipArchive::CREATE | ZipArchive::OVERWRITE)!==true) throw new RuntimeException('Unable to create Excel report.');
            $zip->addFromString('[Content_Types].xml','<?xml version="1.0" encoding="UTF-8"?><Types xmlns="http://schemas.openxmlformats.org/package/2006/content-types"><Default Extension="rels" ContentType="application/vnd.openxmlformats-package.relationships+xml"/><Default Extension="xml" ContentType="application/xml"/><Override PartName="/xl/workbook.xml" ContentType="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet.main+xml"/><Override PartName="/xl/worksheets/sheet1.xml" ContentType="application/vnd.openxmlformats-officedocument.spreadsheetml.worksheet+xml"/><Override PartName="/xl/styles.xml" ContentType="application/vnd.openxmlformats-officedocument.spreadsheetml.styles+xml"/></Types>');
            $zip->addFromString('_rels/.rels','<?xml version="1.0"?><Relationships xmlns="http://schemas.openxmlformats.org/package/2006/relationships"><Relationship Id="rId1" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/officeDocument" Target="xl/workbook.xml"/></Relationships>');
            $zip->addFromString('xl/workbook.xml','<?xml version="1.0"?><workbook xmlns="http://schemas.openxmlformats.org/spreadsheetml/2006/main" xmlns:r="http://schemas.openxmlformats.org/officeDocument/2006/relationships"><sheets><sheet name="Revenue" sheetId="1" r:id="rId1"/></sheets></workbook>');
            $zip->addFromString('xl/_rels/workbook.xml.rels','<?xml version="1.0"?><Relationships xmlns="http://schemas.openxmlformats.org/package/2006/relationships"><Relationship Id="rId1" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/worksheet" Target="worksheets/sheet1.xml"/><Relationship Id="rId2" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/styles" Target="styles.xml"/></Relationships>');
            $zip->addFromString('xl/styles.xml',self::styles());
            $zip->addFile($sheet,'xl/worksheets/sheet1.xml');
            if (!$zip->close()) throw new RuntimeException('Unable to finish Excel report.');
        } finally {
            if (is_file($sheet)) unlink($sheet);
        }
    }

    private static function styles(): string
    {
        return '<?xml version="1.0"?><styleSheet xmlns="http://schemas.openxmlformats.org/spreadsheetml/2006/main"><numFmts count="2"><numFmt numFmtId="164" formatCode="&quot;LKR&quot; #,##0.00"/><numFmt numFmtId="165" formatCode="dd mmm yyyy"/></numFmts><fonts count="2"><font><sz val="11"/><color rgb="FF4D4545"/><name val="Calibri"/></font><font><b/><sz val="11"/><color rgb="FFFFFFFF"/><name val="Calibri"/></font></fonts><fills count="3"><fill><patternFill patternType="none"/></fill><fill><patternFill patternType="gray125"/></fill><fill><patternFill patternType="solid"><fgColor rgb="FF8B1E24"/><bgColor indexed="64"/></patternFill></fill></fills><borders count="2"><border/><border><bottom style="thin"><color rgb="FFE9E3DE"/></bottom></border></borders><cellStyleXfs count="1"><xf numFmtId="0" fontId="0" fillId="0" borderId="0"/></cellStyleXfs><cellXfs count="5"><xf numFmtId="0" fontId="0" fillId="0" borderId="0" xfId="0"/><xf numFmtId="0" fontId="1" fillId="2" borderId="0" xfId="0" applyAlignment="1"><alignment vertical="center" wrapText="1"/></xf><xf numFmtId="0" fontId="0" fillId="0" borderId="1" xfId="0" applyAlignment="1"><alignment vertical="center" wrapText="1"/></xf><xf numFmtId="164" fontId="0" fillId="0" borderId="1" xfId="0" applyNumberFormat="1" applyAlignment="1"><alignment vertical="center"/></xf><xf numFmtId="165" fontId="0" fillId="0" borderId="1" xfId="0" applyNumberFormat="1" applyAlignment="1"><alignment vertical="center"/></xf></cellXfs><cellStyles count="1"><cellStyle name="Normal" xfId="0" builtinId="0"/></cellStyles></styleSheet>';
    }
}
