<?php
namespace App\Http\Controllers;
use App\Models\{Property, SavedProperty};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class SavedPropertyController extends Controller
{
    public function store(Request $request,int $property)
    {
        DB::transaction(function() use ($request,$property){
            $listing=Property::where('status','published')->lockForUpdate()->findOrFail($property);
            SavedProperty::firstOrCreate(['user_id'=>$request->user()->id,'property_id'=>$listing->id]);
        });
        return back()->with('saved_message','Property saved to your buyer dashboard.');
    }
    public function destroy(Request $request,int $property)
    {
        // An unavailable listing can still be removed without exposing its details.
        SavedProperty::where('user_id',$request->user()->id)->where('property_id',$property)->delete();
        return back()->with('saved_message','Property removed from your saved list.');
    }
}
