import sharp from 'sharp';
import { readFile, writeFile } from 'node:fs/promises';

const source = new URL('../public/assets/img/lassana-property-logo.png', import.meta.url);
const output = new URL('../public/assets/img/lassana-property-logo-lossless.webp', import.meta.url);
const original = await readFile(source);

// File encoding only: preserve the original dimensions and every decoded pixel.
const encoded = await sharp(original).webp({ lossless: true, effort: 6 }).toBuffer();
const before = await sharp(original).ensureAlpha().raw().toBuffer({ resolveWithObject: true });
const after = await sharp(encoded).ensureAlpha().raw().toBuffer({ resolveWithObject: true });
if (before.info.width !== after.info.width || before.info.height !== after.info.height || !before.data.equals(after.data)) {
    throw new Error('Logo pixel verification failed; no output was written.');
}
await writeFile(output, encoded);
console.log(`Logo: ${original.length} -> ${encoded.length} bytes; identical ${before.info.width}x${before.info.height} pixels.`);
