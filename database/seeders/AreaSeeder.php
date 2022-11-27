<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Area::create( [
            'id'=>1,
            'area'=>'Auckland',
            'zone_id'=>'1',
            'dispatch'=>NULL,
            'status'=>1
        ] );

        Area::create( [
            'id'=>3,
            'area'=>'Airport',
            'zone_id'=>'33',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>4,
            'area'=>'Akaroa',
            'zone_id'=>'501',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>5,
            'area'=>'Albany',
            'zone_id'=>'2',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>6,
            'area'=>'Albany Heights',
            'zone_id'=>'2',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>7,
            'area'=>'Albury',
            'zone_id'=>'503',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>8,
            'area'=>'Alexandra',
            'zone_id'=>'504',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>9,
            'area'=>'Amuri',
            'zone_id'=>'505',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>10,
            'area'=>'Aniwaniwa',
            'zone_id'=>'506',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>11,
            'area'=>'Aoraki',
            'zone_id'=>'507',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>12,
            'area'=>'Ardmore',
            'zone_id'=>'508',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>13,
            'area'=>'Army Bay',
            'zone_id'=>'509',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>14,
            'area'=>'Arrowtown',
            'zone_id'=>'510',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>15,
            'area'=>'Arthur\'s Pass',
            'zone_id'=>'511',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>16,
            'area'=>'Ashburton',
            'zone_id'=>'512',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>17,
            'area'=>'Auckland',
            'zone_id'=>'513',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>18,
            'area'=>'Autostop Dedicated',
            'zone_id'=>'767',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>19,
            'area'=>'Avondale',
            'zone_id'=>'14',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>20,
            'area'=>'Awatere Valley',
            'zone_id'=>'514',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>21,
            'area'=>'Balclutha',
            'zone_id'=>'515',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>22,
            'area'=>'Balmoral',
            'zone_id'=>'16',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>23,
            'area'=>'Banks Peninsula',
            'zone_id'=>'516',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>24,
            'area'=>'Bannockburn',
            'zone_id'=>'517',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>25,
            'area'=>'Bayswater',
            'zone_id'=>'5',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>26,
            'area'=>'Bayview',
            'zone_id'=>'3',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>27,
            'area'=>'Beachhaven',
            'zone_id'=>'6',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>28,
            'area'=>'Beachlands',
            'zone_id'=>'518',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>29,
            'area'=>'Belmont',
            'zone_id'=>'5',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>30,
            'area'=>'Bendigo',
            'zone_id'=>'519',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>31,
            'area'=>'Benmore Dam',
            'zone_id'=>'520',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>32,
            'area'=>'Birkdale',
            'zone_id'=>'6',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>33,
            'area'=>'Birkenhead',
            'zone_id'=>'3',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>34,
            'area'=>'Blenheim',
            'zone_id'=>'521',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>35,
            'area'=>'Blockhouse Bay',
            'zone_id'=>'18',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>36,
            'area'=>'Bluff',
            'zone_id'=>'522',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>37,
            'area'=>'BNT DEDICATED',
            'zone_id'=>'765',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>38,
            'area'=>'Bombay',
            'zone_id'=>'523',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>39,
            'area'=>'Botany Downs',
            'zone_id'=>'34',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>40,
            'area'=>'Bream Bay',
            'zone_id'=>'524',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>41,
            'area'=>'BRENDWYN',
            'zone_id'=>'525',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>42,
            'area'=>'Broadway Park',
            'zone_id'=>'21',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>43,
            'area'=>'BROOKBY',
            'zone_id'=>'526',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>44,
            'area'=>'Brookfield',
            'zone_id'=>'2',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>45,
            'area'=>'Browns Bay',
            'zone_id'=>'1',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>46,
            'area'=>'Bucklands Beach',
            'zone_id'=>'35',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>47,
            'area'=>'Buller',
            'zone_id'=>'527',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>48,
            'area'=>'Bulls',
            'zone_id'=>'528',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>49,
            'area'=>'Burkes Pass',
            'zone_id'=>'529',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>50,
            'area'=>'Bushlands',
            'zone_id'=>'2',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>51,
            'area'=>'CAMBRIDGE',
            'zone_id'=>'530',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>52,
            'area'=>'Campbells Bay',
            'zone_id'=>'4',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>53,
            'area'=>'Canterbury',
            'zone_id'=>'531',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>54,
            'area'=>'Cardrona',
            'zone_id'=>'532',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>55,
            'area'=>'Carr Rd',
            'zone_id'=>'533',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>56,
            'area'=>'Castor Bay',
            'zone_id'=>'4',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>57,
            'area'=>'Catlins',
            'zone_id'=>'534',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>58,
            'area'=>'Chapel Downs',
            'zone_id'=>'37',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>59,
            'area'=>'Chatham Islands',
            'zone_id'=>'535',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>60,
            'area'=>'Chatswood',
            'zone_id'=>'6',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>61,
            'area'=>'Cheltenham',
            'zone_id'=>'5',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>62,
            'area'=>'Chester Park',
            'zone_id'=>'3',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>63,
            'area'=>'Christchurch',
            'zone_id'=>'536',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>64,
            'area'=>'City',
            'zone_id'=>'21',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>65,
            'area'=>'Clarence River',
            'zone_id'=>'537',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>66,
            'area'=>'Clarks Beach',
            'zone_id'=>'538',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>67,
            'area'=>'Clendon',
            'zone_id'=>'39',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>68,
            'area'=>'Clevedon',
            'zone_id'=>'539',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>69,
            'area'=>'Clover Park',
            'zone_id'=>'37',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>70,
            'area'=>'Clutha',
            'zone_id'=>'540',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>71,
            'area'=>'Clyde',
            'zone_id'=>'541',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>72,
            'area'=>'COATESVILLE',
            'zone_id'=>'542',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>73,
            'area'=>'Cockle Bay',
            'zone_id'=>'35',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>74,
            'area'=>'College Hill',
            'zone_id'=>'21',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>75,
            'area'=>'Colville',
            'zone_id'=>'543',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>76,
            'area'=>'Conifer Grove',
            'zone_id'=>'39',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>77,
            'area'=>'Cooks Beach',
            'zone_id'=>'544',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>78,
            'area'=>'Coromandel',
            'zone_id'=>'545',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>79,
            'area'=>'Coronet Peak',
            'zone_id'=>'546',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>80,
            'area'=>'Coyle Park',
            'zone_id'=>'547',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>81,
            'area'=>'Craigieburn',
            'zone_id'=>'548',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>82,
            'area'=>'Cromwell',
            'zone_id'=>'549',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>83,
            'area'=>'DAIRY FLAT',
            'zone_id'=>'550',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>84,
            'area'=>'Danemora',
            'zone_id'=>'36',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>85,
            'area'=>'Dannevirke',
            'zone_id'=>'551',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>86,
            'area'=>'Dargaville',
            'zone_id'=>'552',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>87,
            'area'=>'DEDICATED',
            'zone_id'=>'769',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>88,
            'area'=>'Devonport',
            'zone_id'=>'5',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>89,
            'area'=>'Doubtful Sound',
            'zone_id'=>'553',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>90,
            'area'=>'Doubtless Bay',
            'zone_id'=>'554',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>91,
            'area'=>'Drury Industrial',
            'zone_id'=>'40',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>92,
            'area'=>'Dunedin',
            'zone_id'=>'555',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>93,
            'area'=>'Duntroon',
            'zone_id'=>'556',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>94,
            'area'=>'East Tamaki',
            'zone_id'=>'36',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>95,
            'area'=>'East Tamaki Heights',
            'zone_id'=>'36',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>96,
            'area'=>'East Tamaki Industrial',
            'zone_id'=>'36',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>97,
            'area'=>'Eastern Beach',
            'zone_id'=>'35',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>98,
            'area'=>'Eden Terrace',
            'zone_id'=>'21',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>99,
            'area'=>'Ellerslie',
            'zone_id'=>'24',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>100,
            'area'=>'Epsom City End',
            'zone_id'=>'20',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>101,
            'area'=>'Epsom South',
            'zone_id'=>'17',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>102,
            'area'=>'Fairlie',
            'zone_id'=>'557',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>103,
            'area'=>'Farm Cove',
            'zone_id'=>'34',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>104,
            'area'=>'Favona',
            'zone_id'=>'32',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>105,
            'area'=>'Feilding',
            'zone_id'=>'558',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>106,
            'area'=>'Fiordland',
            'zone_id'=>'559',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>107,
            'area'=>'Flat Bush',
            'zone_id'=>'37',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>108,
            'area'=>'Forrest Hill',
            'zone_id'=>'4',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>109,
            'area'=>'Forsyth Island',
            'zone_id'=>'560',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>110,
            'area'=>'Fox Glacier',
            'zone_id'=>'561',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>111,
            'area'=>'Fox Peak',
            'zone_id'=>'562',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>112,
            'area'=>'Franklin',
            'zone_id'=>'563',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>113,
            'area'=>'Franz Josef',
            'zone_id'=>'564',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>114,
            'area'=>'Freemans Bay',
            'zone_id'=>'21',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>115,
            'area'=>'French Bay',
            'zone_id'=>'13',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>116,
            'area'=>'Geraldine',
            'zone_id'=>'565',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>117,
            'area'=>'Gisborne',
            'zone_id'=>'566',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>118,
            'area'=>'Glen Eden',
            'zone_id'=>'11',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>119,
            'area'=>'Glen Eden South',
            'zone_id'=>'12',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>120,
            'area'=>'Glen Eden West',
            'zone_id'=>'12',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>121,
            'area'=>'Glen Innes',
            'zone_id'=>'28',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>122,
            'area'=>'GLENBROOKE',
            'zone_id'=>'567',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>123,
            'area'=>'Glendene',
            'zone_id'=>'11',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>124,
            'area'=>'Glendowie',
            'zone_id'=>'27',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>125,
            'area'=>'Glenfield',
            'zone_id'=>'3',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>126,
            'area'=>'Glenfield Industrial',
            'zone_id'=>'3',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>127,
            'area'=>'Glenfield Residential',
            'zone_id'=>'3',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>128,
            'area'=>'Glenorchy',
            'zone_id'=>'568',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>129,
            'area'=>'Goat Island',
            'zone_id'=>'569',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>130,
            'area'=>'Golden Bay',
            'zone_id'=>'570',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>131,
            'area'=>'Goodward Heights',
            'zone_id'=>'37',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>132,
            'area'=>'Gore',
            'zone_id'=>'571',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>133,
            'area'=>'Grafton',
            'zone_id'=>'21',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>134,
            'area'=>'Great Barrier Island',
            'zone_id'=>'572',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>135,
            'area'=>'Green Bay',
            'zone_id'=>'13',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>136,
            'area'=>'Greenhithe',
            'zone_id'=>'7',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>137,
            'area'=>'Greenlane',
            'zone_id'=>'24',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>138,
            'area'=>'Greenlane North',
            'zone_id'=>'24',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>139,
            'area'=>'Greenlane South',
            'zone_id'=>'24',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>140,
            'area'=>'Greenmount',
            'zone_id'=>'34',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>141,
            'area'=>'Greenwoods Corner',
            'zone_id'=>'24',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>142,
            'area'=>'Grey Lynn',
            'zone_id'=>'21',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>143,
            'area'=>'Greymouth',
            'zone_id'=>'573',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>144,
            'area'=>'Haast Pass',
            'zone_id'=>'574',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>145,
            'area'=>'Hahei',
            'zone_id'=>'575',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>146,
            'area'=>'Haka Pass',
            'zone_id'=>'576',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>147,
            'area'=>'Half Moon Bay',
            'zone_id'=>'34',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>148,
            'area'=>'Hamilton',
            'zone_id'=>'577',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>149,
            'area'=>'Hamner Springs',
            'zone_id'=>'578',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>150,
            'area'=>'Hari Hari',
            'zone_id'=>'579',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>151,
            'area'=>'Hastings',
            'zone_id'=>'580',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>152,
            'area'=>'Hauraki Corner',
            'zone_id'=>'5',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>153,
            'area'=>'Havelock',
            'zone_id'=>'581',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>154,
            'area'=>'Havelock North',
            'zone_id'=>'582',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>155,
            'area'=>'Hawera',
            'zone_id'=>'583',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>156,
            'area'=>'Hawkes Bay',
            'zone_id'=>'584',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>157,
            'area'=>'Heaphy Track',
            'zone_id'=>'585',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>158,
            'area'=>'Helensville',
            'zone_id'=>'586',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>159,
            'area'=>'Henderson',
            'zone_id'=>'11',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>160,
            'area'=>'Herald Island',
            'zone_id'=>'587',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>161,
            'area'=>'Herne Bay',
            'zone_id'=>'22',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>162,
            'area'=>'Hibiscus Coast',
            'zone_id'=>'588',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>163,
            'area'=>'Highbury',
            'zone_id'=>'3',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>164,
            'area'=>'Highland Park',
            'zone_id'=>'34',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>165,
            'area'=>'Hill Park',
            'zone_id'=>'39',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>166,
            'area'=>'Hillcrest',
            'zone_id'=>'3',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>167,
            'area'=>'Hillsborough',
            'zone_id'=>'17',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>168,
            'area'=>'HOBSONVILLE',
            'zone_id'=>'589',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>169,
            'area'=>'Hokianga',
            'zone_id'=>'590',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>170,
            'area'=>'Hokianga Harbour',
            'zone_id'=>'591',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>171,
            'area'=>'Hokitika',
            'zone_id'=>'592',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>172,
            'area'=>'Homai',
            'zone_id'=>'39',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>173,
            'area'=>'Horowhenua',
            'zone_id'=>'593',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>174,
            'area'=>'Howick',
            'zone_id'=>'34',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>175,
            'area'=>'Huapai',
            'zone_id'=>'594',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>176,
            'area'=>'Huka Falls',
            'zone_id'=>'595',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>177,
            'area'=>'Hunters Corner',
            'zone_id'=>'36',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>178,
            'area'=>'Huntly',
            'zone_id'=>'596',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>179,
            'area'=>'Hunua',
            'zone_id'=>'763',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>180,
            'area'=>'Invercargill',
            'zone_id'=>'597',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>181,
            'area'=>'Island Bay',
            'zone_id'=>'598',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>182,
            'area'=>'Johnsonville',
            'zone_id'=>'599',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>183,
            'area'=>'Kaikohe',
            'zone_id'=>'600',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>184,
            'area'=>'Kaikoura',
            'zone_id'=>'601',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>185,
            'area'=>'Kaitaia',
            'zone_id'=>'602',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>186,
            'area'=>'Kapiti Coast',
            'zone_id'=>'603',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>187,
            'area'=>'Karaka',
            'zone_id'=>'604',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>188,
            'area'=>'Karamea',
            'zone_id'=>'605',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>189,
            'area'=>'Karekare',
            'zone_id'=>'606',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>190,
            'area'=>'Katikati',
            'zone_id'=>'607',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>191,
            'area'=>'kaukapakapa',
            'zone_id'=>'608',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>192,
            'area'=>'Kaurilands',
            'zone_id'=>'12',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>193,
            'area'=>'Kawakawa',
            'zone_id'=>'609',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>194,
            'area'=>'Kawerau',
            'zone_id'=>'610',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>195,
            'area'=>'Kelston',
            'zone_id'=>'14',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>196,
            'area'=>'Kerikeri',
            'zone_id'=>'611',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>197,
            'area'=>'KINGSEAT',
            'zone_id'=>'0',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>198,
            'area'=>'Kingsland',
            'zone_id'=>'21',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>199,
            'area'=>'Kohimarama',
            'zone_id'=>'26',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>200,
            'area'=>'Konini',
            'zone_id'=>'12',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>201,
            'area'=>'Kumeu',
            'zone_id'=>'613',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>202,
            'area'=>'Kurow',
            'zone_id'=>'614',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>203,
            'area'=>'Laingholm',
            'zone_id'=>'615',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>204,
            'area'=>'Lawrence',
            'zone_id'=>'616',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>205,
            'area'=>'Lincoln',
            'zone_id'=>'11',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>206,
            'area'=>'Long Bay',
            'zone_id'=>'1',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>207,
            'area'=>'Lynfield',
            'zone_id'=>'18',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>208,
            'area'=>'Lyttelton',
            'zone_id'=>'617',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>209,
            'area'=>'Mairangi Bay',
            'zone_id'=>'4',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>210,
            'area'=>'Mairangi Bay Ind',
            'zone_id'=>'3',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>211,
            'area'=>'Manapouri',
            'zone_id'=>'620',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>212,
            'area'=>'Manawatu',
            'zone_id'=>'621',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>213,
            'area'=>'Mangawhai Heads',
            'zone_id'=>'622',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>214,
            'area'=>'Mangere',
            'zone_id'=>'33',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>215,
            'area'=>'Mangere Bridge',
            'zone_id'=>'33',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>216,
            'area'=>'Mangere East',
            'zone_id'=>'33',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>217,
            'area'=>'Maniototo Plains',
            'zone_id'=>'623',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>218,
            'area'=>'Manly',
            'zone_id'=>'624',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>219,
            'area'=>'Manukau',
            'zone_id'=>'38',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>220,
            'area'=>'Manukau Heights',
            'zone_id'=>'37',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>221,
            'area'=>'Manurewa',
            'zone_id'=>'39',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>222,
            'area'=>'Maraetai',
            'zone_id'=>'625',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>223,
            'area'=>'Marcus Motors',
            'zone_id'=>'619',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>224,
            'area'=>'Marlborough',
            'zone_id'=>'626',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>225,
            'area'=>'Massey',
            'zone_id'=>'9',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>226,
            'area'=>'Massey Campus',
            'zone_id'=>'2',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>227,
            'area'=>'Massey East',
            'zone_id'=>'8',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>228,
            'area'=>'Massey North',
            'zone_id'=>'9',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>229,
            'area'=>'Massey West',
            'zone_id'=>'9',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>230,
            'area'=>'MASTERTON',
            'zone_id'=>'627',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>231,
            'area'=>'Matakana',
            'zone_id'=>'628',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>232,
            'area'=>'Matamata',
            'zone_id'=>'629',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>233,
            'area'=>'Matauri Bay',
            'zone_id'=>'630',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>234,
            'area'=>'Maungaturoto',
            'zone_id'=>'631',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>235,
            'area'=>'McLaren Park',
            'zone_id'=>'11',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>236,
            'area'=>'Meadowbank',
            'zone_id'=>'25',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>237,
            'area'=>'Mechanics Bay',
            'zone_id'=>'21',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>238,
            'area'=>'Mellons Bay',
            'zone_id'=>'35',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>239,
            'area'=>'MERCER',
            'zone_id'=>'632',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>240,
            'area'=>'MERE MERE',
            'zone_id'=>'634',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>241,
            'area'=>'Methven',
            'zone_id'=>'635',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>242,
            'area'=>'Middlemarch',
            'zone_id'=>'636',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>243,
            'area'=>'Middlemore',
            'zone_id'=>'31',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>244,
            'area'=>'Milford',
            'zone_id'=>'4',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>245,
            'area'=>'Millwater',
            'zone_id'=>'633',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>246,
            'area'=>'Mission Bay',
            'zone_id'=>'26',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>247,
            'area'=>'Morningside',
            'zone_id'=>'16',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>248,
            'area'=>'Morrinsville',
            'zone_id'=>'637',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>249,
            'area'=>'Mosgiel',
            'zone_id'=>'638',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>250,
            'area'=>'Motueka',
            'zone_id'=>'639',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>251,
            'area'=>'Mt Albert',
            'zone_id'=>'16',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>252,
            'area'=>'Mt Cheeseman',
            'zone_id'=>'641',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>253,
            'area'=>'Mt Cook',
            'zone_id'=>'642',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>254,
            'area'=>'Mt Eden City End',
            'zone_id'=>'20',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>255,
            'area'=>'Mt Eden South',
            'zone_id'=>'17',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>256,
            'area'=>'Mt Hutt',
            'zone_id'=>'643',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>257,
            'area'=>'Mt Maunganui',
            'zone_id'=>'644',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>258,
            'area'=>'Mt Nguarahoe',
            'zone_id'=>'645',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>259,
            'area'=>'Mt Roskill',
            'zone_id'=>'17',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>260,
            'area'=>'Mt Wellington',
            'zone_id'=>'29',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>261,
            'area'=>'Murchison',
            'zone_id'=>'646',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>262,
            'area'=>'Muriwai',
            'zone_id'=>'647',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>263,
            'area'=>'Murrays Bay',
            'zone_id'=>'1',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>264,
            'area'=>'Napier',
            'zone_id'=>'648',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>265,
            'area'=>'Narrow Neck',
            'zone_id'=>'5',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>266,
            'area'=>'Nelson',
            'zone_id'=>'649',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>267,
            'area'=>'New Lynn',
            'zone_id'=>'14',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>268,
            'area'=>'New Plymouth',
            'zone_id'=>'650',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>269,
            'area'=>'New Windsor',
            'zone_id'=>'16',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>270,
            'area'=>'Newmarket',
            'zone_id'=>'21',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>271,
            'area'=>'Newton',
            'zone_id'=>'21',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>272,
            'area'=>'Ngatea',
            'zone_id'=>'651',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>273,
            'area'=>'Norsewood',
            'zone_id'=>'652',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>274,
            'area'=>'Northcote',
            'zone_id'=>'3',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>275,
            'area'=>'Northcross',
            'zone_id'=>'1',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>276,
            'area'=>'Nth Harbour',
            'zone_id'=>'3',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>277,
            'area'=>'Oamaru',
            'zone_id'=>'653',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>278,
            'area'=>'Ohakune',
            'zone_id'=>'654',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>279,
            'area'=>'Ohau',
            'zone_id'=>'655',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>280,
            'area'=>'Okarito',
            'zone_id'=>'656',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>281,
            'area'=>'Okura',
            'zone_id'=>'762',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>282,
            'area'=>'Omarama',
            'zone_id'=>'657',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>283,
            'area'=>'One Tree Hill',
            'zone_id'=>'19',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>284,
            'area'=>'Onehunga',
            'zone_id'=>'30',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>285,
            'area'=>'Opononi',
            'zone_id'=>'658',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>286,
            'area'=>'Opotiki',
            'zone_id'=>'659',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>287,
            'area'=>'Opua',
            'zone_id'=>'660',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>288,
            'area'=>'Orakei',
            'zone_id'=>'26',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>289,
            'area'=>'Oranga',
            'zone_id'=>'30',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>290,
            'area'=>'Oratia',
            'zone_id'=>'12',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>291,
            'area'=>'Orewa',
            'zone_id'=>'661',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>292,
            'area'=>'Ormiston',
            'zone_id'=>'764',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>293,
            'area'=>'Otahuhu',
            'zone_id'=>'31',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>294,
            'area'=>'Otakou',
            'zone_id'=>'662',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>295,
            'area'=>'Otakou Peninsula',
            'zone_id'=>'663',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>296,
            'area'=>'Otara',
            'zone_id'=>'36',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>297,
            'area'=>'Otematata',
            'zone_id'=>'664',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>298,
            'area'=>'Otorohonga',
            'zone_id'=>'665',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>299,
            'area'=>'Owairaka',
            'zone_id'=>'16',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>300,
            'area'=>'Paeroa',
            'zone_id'=>'666',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>301,
            'area'=>'PAHIATUA',
            'zone_id'=>'667',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>302,
            'area'=>'Paihia',
            'zone_id'=>'668',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>303,
            'area'=>'Pakatoa Island',
            'zone_id'=>'669',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>304,
            'area'=>'Pakuranga',
            'zone_id'=>'34',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>305,
            'area'=>'Pakuranga Heights',
            'zone_id'=>'34',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>306,
            'area'=>'Palmerston',
            'zone_id'=>'670',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>307,
            'area'=>'Palmerston North',
            'zone_id'=>'671',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>308,
            'area'=>'Pancake Rocks',
            'zone_id'=>'672',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>309,
            'area'=>'Panmure',
            'zone_id'=>'29',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>310,
            'area'=>'Papakura',
            'zone_id'=>'40',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>311,
            'area'=>'Papamoa',
            'zone_id'=>'673',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>312,
            'area'=>'Papatoetoe',
            'zone_id'=>'38',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>313,
            'area'=>'Paremoremo',
            'zone_id'=>'674',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>314,
            'area'=>'Parnell',
            'zone_id'=>'21',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>315,
            'area'=>'Patumahoe',
            'zone_id'=>'758',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>316,
            'area'=>'Pauanui',
            'zone_id'=>'675',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>317,
            'area'=>'Penrose',
            'zone_id'=>'30',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>318,
            'area'=>'Picton',
            'zone_id'=>'676',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>319,
            'area'=>'Ponsonby',
            'zone_id'=>'21',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>320,
            'area'=>'Porirua',
            'zone_id'=>'677',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>321,
            'area'=>'Port Otago',
            'zone_id'=>'678',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>322,
            'area'=>'Pt Chevalier',
            'zone_id'=>'15',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>323,
            'area'=>'Pt England',
            'zone_id'=>'28',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>324,
            'area'=>'Puhio',
            'zone_id'=>'679',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>325,
            'area'=>'Puhunui',
            'zone_id'=>'38',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>326,
            'area'=>'Puke Ariki',
            'zone_id'=>'680',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>327,
            'area'=>'Pukekohe',
            'zone_id'=>'41',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>328,
            'area'=>'Punakaiki',
            'zone_id'=>'682',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>329,
            'area'=>'PUTARURU',
            'zone_id'=>'683',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>330,
            'area'=>'Queenstown',
            'zone_id'=>'684',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>331,
            'area'=>'r',
            'zone_id'=>'500',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>332,
            'area'=>'Raglan',
            'zone_id'=>'685',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>333,
            'area'=>'Rainbow Springs',
            'zone_id'=>'686',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>334,
            'area'=>'Rakaia',
            'zone_id'=>'687',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>335,
            'area'=>'RAMARAMA',
            'zone_id'=>'688',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>336,
            'area'=>'Ranfurly',
            'zone_id'=>'689',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>337,
            'area'=>'Ranui',
            'zone_id'=>'11',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>338,
            'area'=>'RED BEACH',
            'zone_id'=>'690',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>339,
            'area'=>'Redvale',
            'zone_id'=>'761',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>340,
            'area'=>'Reefton',
            'zone_id'=>'691',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>341,
            'area'=>'Remuera',
            'zone_id'=>'23',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>342,
            'area'=>'REPCO DAILY SERVICE',
            'zone_id'=>'3',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>343,
            'area'=>'REPCO DEDICATED',
            'zone_id'=>'0',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>344,
            'area'=>'Reporoa',
            'zone_id'=>'692',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>345,
            'area'=>'Riverhead',
            'zone_id'=>'693',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>346,
            'area'=>'Riverton',
            'zone_id'=>'694',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>347,
            'area'=>'Rosedale',
            'zone_id'=>'2',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>348,
            'area'=>'Ross',
            'zone_id'=>'695',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>349,
            'area'=>'Rothesay Bay',
            'zone_id'=>'1',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>350,
            'area'=>'Rotorua',
            'zone_id'=>'696',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>351,
            'area'=>'Roxburgh',
            'zone_id'=>'697',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>352,
            'area'=>'Royal Heights',
            'zone_id'=>'9',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>353,
            'area'=>'Royal Oak',
            'zone_id'=>'19',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>354,
            'area'=>'Runciman',
            'zone_id'=>'698',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>355,
            'area'=>'Sandringham',
            'zone_id'=>'16',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>356,
            'area'=>'Shantytown',
            'zone_id'=>'699',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>357,
            'area'=>'Shelly Park',
            'zone_id'=>'35',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>358,
            'area'=>'Silverdale',
            'zone_id'=>'700',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>359,
            'area'=>'SNELLS BEACH',
            'zone_id'=>'701',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>360,
            'area'=>'Somerville',
            'zone_id'=>'34',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>361,
            'area'=>'Southdown',
            'zone_id'=>'30',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>362,
            'area'=>'Southland',
            'zone_id'=>'702',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>363,
            'area'=>'St Heliers',
            'zone_id'=>'27',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>364,
            'area'=>'St Johns',
            'zone_id'=>'25',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>365,
            'area'=>'St Lukes',
            'zone_id'=>'16',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>366,
            'area'=>'St Marys Bay',
            'zone_id'=>'21',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>367,
            'area'=>'Stanley Bay',
            'zone_id'=>'5',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>368,
            'area'=>'Stanley Point',
            'zone_id'=>'5',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>369,
            'area'=>'Stanmore Bay',
            'zone_id'=>'760',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>370,
            'area'=>'Stewart Island',
            'zone_id'=>'703',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>371,
            'area'=>'Stratford',
            'zone_id'=>'704',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>372,
            'area'=>'Sunnyhills',
            'zone_id'=>'34',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>373,
            'area'=>'Sunnynook',
            'zone_id'=>'4',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>374,
            'area'=>'Sunnyvale',
            'zone_id'=>'11',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>375,
            'area'=>'Sunset Nth Ind',
            'zone_id'=>'3',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>376,
            'area'=>'Swanson',
            'zone_id'=>'11',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>377,
            'area'=>'Tairua',
            'zone_id'=>'705',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>378,
            'area'=>'Takanini',
            'zone_id'=>'40',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>379,
            'area'=>'Takapuna',
            'zone_id'=>'4',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>380,
            'area'=>'Takiroa',
            'zone_id'=>'706',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>381,
            'area'=>'Tamaki',
            'zone_id'=>'28',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>382,
            'area'=>'Taradale',
            'zone_id'=>'707',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>383,
            'area'=>'Tararua',
            'zone_id'=>'708',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>384,
            'area'=>'Tatapouri',
            'zone_id'=>'709',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>385,
            'area'=>'Taumarunui',
            'zone_id'=>'710',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>386,
            'area'=>'TAUPAKI',
            'zone_id'=>'711',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>387,
            'area'=>'Taupo',
            'zone_id'=>'712',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>388,
            'area'=>'Tauranga',
            'zone_id'=>'713',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>389,
            'area'=>'Te Anau',
            'zone_id'=>'714',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>390,
            'area'=>'Te Aroha',
            'zone_id'=>'715',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>391,
            'area'=>'Te Atatu North',
            'zone_id'=>'10',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>392,
            'area'=>'Te Atatu South',
            'zone_id'=>'10',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>393,
            'area'=>'Te Awamutu',
            'zone_id'=>'759',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>394,
            'area'=>'Te Papapa',
            'zone_id'=>'30',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>395,
            'area'=>'Te Puke',
            'zone_id'=>'716',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>396,
            'area'=>'Temuka',
            'zone_id'=>'717',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>397,
            'area'=>'Thames',
            'zone_id'=>'718',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>398,
            'area'=>'Three Kings',
            'zone_id'=>'17',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>399,
            'area'=>'Timaru',
            'zone_id'=>'719',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>400,
            'area'=>'Tirau',
            'zone_id'=>'720',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>401,
            'area'=>'Titirangi',
            'zone_id'=>'12',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>402,
            'area'=>'Tokoroa',
            'zone_id'=>'725',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>403,
            'area'=>'Torbay',
            'zone_id'=>'1',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>404,
            'area'=>'Totara Heights',
            'zone_id'=>'37',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>405,
            'area'=>'TUAKAU',
            'zone_id'=>'721',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>406,
            'area'=>'Tuatapere',
            'zone_id'=>'722',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>407,
            'area'=>'Turangi',
            'zone_id'=>'723',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>408,
            'area'=>'Twizel',
            'zone_id'=>'724',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>409,
            'area'=>'Unsworth Heights',
            'zone_id'=>'3',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>410,
            'area'=>'Upper Hutt',
            'zone_id'=>'725',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>411,
            'area'=>'Viaduct',
            'zone_id'=>'21',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>412,
            'area'=>'Waiake',
            'zone_id'=>'1',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>413,
            'area'=>'Waiheke Island',
            'zone_id'=>'726',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>414,
            'area'=>'Waihi',
            'zone_id'=>'727',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>415,
            'area'=>'WAIKANAE',
            'zone_id'=>'728',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>416,
            'area'=>'Waikouaiti',
            'zone_id'=>'730',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>417,
            'area'=>'Waikowhai',
            'zone_id'=>'18',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>418,
            'area'=>'Waima',
            'zone_id'=>'13',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>419,
            'area'=>'Waimakariri',
            'zone_id'=>'731',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>420,
            'area'=>'Waimate',
            'zone_id'=>'732',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>421,
            'area'=>'Waimauku',
            'zone_id'=>'733',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>422,
            'area'=>'Wainoni',
            'zone_id'=>'7',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>423,
            'area'=>'Waiouru',
            'zone_id'=>'734',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>424,
            'area'=>'Waipu',
            'zone_id'=>'735',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>425,
            'area'=>'Wairau Park',
            'zone_id'=>'3',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>426,
            'area'=>'Wairau Valley',
            'zone_id'=>'3',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>427,
            'area'=>'WAITAKERE',
            'zone_id'=>'736',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>428,
            'area'=>'Waitakere City',
            'zone_id'=>'737',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>429,
            'area'=>'Waitaki',
            'zone_id'=>'738',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>430,
            'area'=>'Waitomo',
            'zone_id'=>'739',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>431,
            'area'=>'Waiuku',
            'zone_id'=>'740',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>432,
            'area'=>'Waiwera',
            'zone_id'=>'741',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>433,
            'area'=>'Wanaka',
            'zone_id'=>'742',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>434,
            'area'=>'Wanganui',
            'zone_id'=>'743',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>435,
            'area'=>'Warkworth',
            'zone_id'=>'744',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>436,
            'area'=>'Waterview',
            'zone_id'=>'15',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>437,
            'area'=>'Wattle Downs',
            'zone_id'=>'39',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>438,
            'area'=>'Wellington',
            'zone_id'=>'745',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>439,
            'area'=>'Wellsford',
            'zone_id'=>'746',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>440,
            'area'=>'West Harbour',
            'zone_id'=>'8',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>441,
            'area'=>'Western Heights',
            'zone_id'=>'11',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>442,
            'area'=>'Western Springs',
            'zone_id'=>'22',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>443,
            'area'=>'Westfield',
            'zone_id'=>'30',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>444,
            'area'=>'Westhaven',
            'zone_id'=>'21',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>445,
            'area'=>'Westlake',
            'zone_id'=>'4',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>446,
            'area'=>'Westland',
            'zone_id'=>'747',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>447,
            'area'=>'Westmere',
            'zone_id'=>'22',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>448,
            'area'=>'Westport',
            'zone_id'=>'748',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>449,
            'area'=>'Weymouth',
            'zone_id'=>'39',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>450,
            'area'=>'Whakapapa',
            'zone_id'=>'749',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>451,
            'area'=>'Whakatane',
            'zone_id'=>'750',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>452,
            'area'=>'Whangamata',
            'zone_id'=>'751',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>453,
            'area'=>'Whangaparoa',
            'zone_id'=>'752',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>454,
            'area'=>'Whangarei',
            'zone_id'=>'753',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>455,
            'area'=>'Whataroa',
            'zone_id'=>'754',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>456,
            'area'=>'Whenuapai',
            'zone_id'=>'755',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>457,
            'area'=>'Whitford',
            'zone_id'=>'756',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>458,
            'area'=>'Whitianga',
            'zone_id'=>'757',
            'dispatch'=>'1',
            'status'=>1
        ] );

        Area::create( [
            'id'=>459,
            'area'=>'Wiri',
            'zone_id'=>'38',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>460,
            'area'=>'Wood Bay',
            'zone_id'=>'13',
            'dispatch'=>'0',
            'status'=>1
        ] );

        Area::create( [
            'id'=>461,
            'area'=>'Woodlands',
            'zone_id'=>'768',
            'dispatch'=>'0',
            'status'=>1
        ] );
    }
}
