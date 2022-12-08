<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\AddressBook;

class AddressBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AddressBook::create( [
            'user_id'=>User::where('role_id',Role::getRoleId(Role::CUSTOMER))->get()->random()->id,
            'company_name'=>'MERZ Construction Products',
            'street_address'=>'Vega Place',
            'street_number'=>'8B',
            'suburb'=>'Rosedale',
            'city'=>'Auckland',
            'state'=>'Auckland',
            'zip'=>'0632',
            'country'=>'New Zealand',
            'place_id'=>'ChIJY9TB-tQ7DW0RGcQWfUdmqWA',
            'area_id'=>Area::all()->random()->id,
            'latitude'=>'-36.7483667',
            'longitude'=>'174.7295167',
            'location_url'=>'https://maps.google.com/?q=8B+Vega+Place,+Rosedale,+Auckland+0632,+New+Zealand&ftid=0x6d0d3bd4fac1d463:0x60a966477d16c419',
            'full_json_response'=>'{\"address_components\":[{\"long_name\":\"8B\",\"short_name\":\"8B\",\"types\":[\"street_number\"]},{\"long_name\":\"Vega Place\",\"short_name\":\"Vega Pl\",\"types\":[\"route\"]},{\"long_name\":\"Rosedale\",\"short_name\":\"Rosedale\",\"types\":[\"sublocality_level_1\",\"sublocality\",\"political\"]},{\"long_name\":\"Auckland\",\"short_name\":\"Auckland\",\"types\":[\"locality\",\"political\"]},{\"long_name\":\"Auckland\",\"short_name\":\"Auckland\",\"types\":[\"administrative_area_level_1\",\"political\"]},{\"long_name\":\"New Zealand\",\"short_name\":\"NZ\",\"types\":[\"country\",\"political\"]},{\"long_name\":\"0632\",\"short_name\":\"0632\",\"types\":[\"postal_code\"]}],\"adr_address\":\"8B Vega Place, Rosedale, Auckland 0632, New Zealand\",\"formatted_address\":\"8B Vega Place, Rosedale, Auckland 0632, New Zealand\",\"geometry\":{\"location\":{\"lat\":-36.7483667,\"lng\":174.7295167},\"viewport\":{\"south\":-36.7496860802915,\"west\":174.7282250197085,\"north\":-36.7469881197085,\"east\":174.7309229802915}},\"icon\":\"https://maps.gstatic.com/mapfiles/place_api/icons/v1/png_71/geocode-71.png\",\"icon_background_color\":\"#7B9EB0\",\"icon_mask_base_uri\":\"https://maps.gstatic.com/mapfiles/place_api/icons/v2/generic_pinlet\",\"name\":\"8B Vega Place\",\"place_id\":\"ChIJY9TB-tQ7DW0RGcQWfUdmqWA\",\"plus_code\":{\"compound_code\":\"7P2H+MR Auckland, New Zealand\",\"global_code\":\"4VMP7P2H+MR\"},\"reference\":\"ChIJY9TB-tQ7DW0RGcQWfUdmqWA\",\"types\":[\"street_address\"],\"url\":\"https://maps.google.com/?q=8B+Vega+Place,+Rosedale,+Auckland+0632,+New+Zealand&ftid=0x6d0d3bd4fac1d463:0x60a966477d16c419\",\"utc_offset\":780,\"vicinity\":\"Rosedale\",\"html_attributions\":[],\"utc_offset_minutes\":780}',
            'status'=>1,
            'set_as_default'=>1
        ] );



        AddressBook::create( [
            'user_id'=>User::where('role_id',Role::getRoleId(Role::DRIVER))->get()->random()->id,
            'company_name'=>'GFC Fasteners',
            'street_address'=>'Carmen Road',
            'street_number'=>'100',
            'suburb'=>'Hornby',
            'city'=>'Christchurch',
            'state'=>'Canterbury',
            'zip'=>'8042',
            'country'=>'New Zealand',
            'place_id'=>'Ei0xMDAgQ2FybWVuIFJvYWQsIENhbnRlcmJ1cnkgODA0MiwgTmV3IFplYWxhbmQiMBIuChQKEgkH2nIFe_UxbRFwSkXeEXv_ARBkKhQKEgmHOEotbvUxbREmPCiSb5sXkQ',
            'area_id'=>Area::all()->random()->id,
            'latitude'=>'-43.53845090000001',
            'longitude'=>'172.5280155',
            'location_url'=>'https://maps.google.com/?q=100+Carmen+Road,+Hornby,+Christchurch+8042,+New+Zealand&ftid=0x6d31f57b0572da07:0xf09bd451b213736a',
            'full_json_response'=>'{\"address_components\":[{\"long_name\":\"100\",\"short_name\":\"100\",\"types\":[\"street_number\"]},{\"long_name\":\"Carmen Road\",\"short_name\":\"Carmen Rd\",\"types\":[\"route\"]},{\"long_name\":\"Hornby\",\"short_name\":\"Hornby\",\"types\":[\"sublocality_level_1\",\"sublocality\",\"political\"]},{\"long_name\":\"Christchurch\",\"short_name\":\"Christchurch\",\"types\":[\"locality\",\"political\"]},{\"long_name\":\"Canterbury\",\"short_name\":\"Canterbury\",\"types\":[\"administrative_area_level_1\",\"political\"]},{\"long_name\":\"New Zealand\",\"short_name\":\"NZ\",\"types\":[\"country\",\"political\"]},{\"long_name\":\"8042\",\"short_name\":\"8042\",\"types\":[\"postal_code\"]}],\"adr_address\":\"100 Carmen Road, Hornby, Christchurch 8042, New Zealand\",\"formatted_address\":\"100 Carmen Road, Hornby, Christchurch 8042, New Zealand\",\"geometry\":{\"location\":{\"lat\":-43.53845090000001,\"lng\":172.5280155},\"viewport\":{\"south\":-43.53979988029152,\"west\":172.5266665197085,\"north\":-43.53710191970852,\"east\":172.5293644802915}},\"icon\":\"https://maps.gstatic.com/mapfiles/place_api/icons/v1/png_71/geocode-71.png\",\"icon_background_color\":\"#7B9EB0\",\"icon_mask_base_uri\":\"https://maps.gstatic.com/mapfiles/place_api/icons/v2/generic_pinlet\",\"name\":\"100 Carmen Road\",\"place_id\":\"Ei0xMDAgQ2FybWVuIFJvYWQsIENhbnRlcmJ1cnkgODA0MiwgTmV3IFplYWxhbmQiMBIuChQKEgkH2nIFe_UxbRFwSkXeEXv_ARBkKhQKEgmHOEotbvUxbREmPCiSb5sXkQ\",\"reference\":\"Ei0xMDAgQ2FybWVuIFJvYWQsIENhbnRlcmJ1cnkgODA0MiwgTmV3IFplYWxhbmQiMBIuChQKEgkH2nIFe_UxbRFwSkXeEXv_ARBkKhQKEgmHOEotbvUxbREmPCiSb5sXkQ\",\"types\":[\"street_address\"],\"url\":\"https://maps.google.com/?q=100+Carmen+Road,+Hornby,+Christchurch+8042,+New+Zealand&ftid=0x6d31f57b0572da07:0xf09bd451b213736a\",\"utc_offset\":780,\"vicinity\":\"Hornby\",\"html_attributions\":[],\"utc_offset_minutes\":780}',
            'status'=>1,
            'set_as_default'=>1
        ] );


    }
}
