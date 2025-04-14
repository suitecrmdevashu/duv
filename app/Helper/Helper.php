<?php
use App\Models\Inventory;
use App\Models\Location;
use App\Models\ItemIssue;
use App\Models\Vendor;
use App\Models\Asset;
use App\Models\Department;
use App\Models\ItemReturn;

if (!function_exists('dump_array')) {
    /**
     * description.
     *
     * @param array $value
     *
     * @return string
     */
    function dump_array($arr)
    {
        echo '<pre/>';
        print_r($arr);
        echo '</pre>';
    }
}


if (!function_exists('generateUniqueReferenceId')) {
    /**
     * description.
     *
     * @param array $value
     *
     * @return string
     */
    function generateUniqueReferenceId(string $preFix, int $id)
    {
        $milliseconds = milliseconds();

        return $preFix.$milliseconds.$id;
    }
}

if (!function_exists('milliseconds')) {

    /**
     * [milliseconds description].
     *
     * @return [type] [description]
     */
    function milliseconds()
    {
        $mt = explode(' ', microtime());
        $random = rand(1000, 9999);

        return $random.((int) $mt[1]) * 100 + ((int) round($mt[0] * 100));
    }
}
if (!function_exists('getVendorDetailsByIssueAsset')) {

    function getVendorDetailsByIssueAsset($id)
    {
        $IssueAsset=ItemIssue::find($id);
        $asset_id= $IssueAsset->item_type;
        $inventory=Inventory::where('item_type',$asset_id)->first();
        $vendor=Vendor::find($inventory->vendor_id);
      
      return  $vendor; 
    }
}
if (!function_exists('getLocationName')) {

    function getLocationName($id)
    {

        $asset = Location::select('id','name')->find($id);
       
        return  $asset->name;
    }
}
if (!function_exists('getDepartmentName')) {

    function getDepartmentName($id)
    {

        $Department = Department::select('id','name')->find($id);
       
        return  $Department->name;
    }
}
if (!function_exists('getAssetName')) {

    function getAssetName($id)
    {

        $asset = Asset::select('id','name')->find($id);
       
        return  $asset->name;
    }
}
if (!function_exists('getVendorDetailsByReturnAsset')) {

    function getVendorDetailsByReturnAsset($id)
    {
        $IssueAsset=ItemReturn::find($id);
        $asset_id= $IssueAsset->item_type;
        $inventory=Inventory::where('item_type',$asset_id)->first();
        $vendor=Vendor::find($inventory->vendor_id);
      
      return  $vendor; 
    }
}