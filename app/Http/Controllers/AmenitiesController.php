<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Amenities;

class AmenitiesController extends Controller
{
    public function AllAmenities()
    {
        $amenities = Amenities::latest()->get();
        return view('backend.amenities.all_amenities', compact('amenities'));
    }// End Method

    public function AddAmenity()
    {
        return view('backend.amenities.add_amenity');
    }// End Method

    public function StoreAmenities(Request $request)
    {
        // Validation
        $request->validate([
            'amenities_name' => 'required|unique:amenities|max:200',
        ]);
        Amenities::insert([
            'amenities_name' => $request->amenities_name,


        ]);

        $notification = [
            'message' => 'Amenity Type Create Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('all.amenities')->with($notification);
    }// End Method

    public function EditAmenity($id)
    {
        $amenities = Amenities::findOrFail($id);
        return view('backend.amenities.edit_amenity',compact('amenities'));
    }// End Method

    public function UpdateAmenity(Request $request)
    {
        $pid = $request->id;
        Amenities::findOrFail($pid)->update([
            'amenities_name' => $request->amenities_name,

        ]);

        $notification = [
            'message' => 'Amenity Type Updated Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('all.amenities')->with($notification);
    }

    public function DeleteAmenity($id)
    {
        $type= Amenities::findOrFail($id);
        $type->delete();

        $notification = array(
            'message' => 'Amenity Type Deleted Successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }
}
