<?php

// database/seeders/TraineeSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Trainee;

class TraineeSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'NYAMAIYA' => [
                'TONGA DEB PRI SCH',
                'TONGA DEB PRI SCH',
                'MATIERIO DEB PRI SCH',
                'GEKOMONI DEB PRI SCH',
                'MARARA SDA PRI SCH',
                'GETAARI DEB PRI SCH',
                'RANGENYO DOK PRI SCH',
                'BONDEKA ELCK PRI SCH',
                'EGESIERI DOK PRI SCH',
                'KEMASARE DOK PRI SCH',
                'OMOKONGE DEB PRI SCH',
                'RATANDI DEB PRI SCH',
                'MIRUKA MARKET',
                'MASOSA AIC PRI SCH',
                'BUGO DOK PRI SCH',
                'BONYAIGUBA DOK PRI SCH',
                'RATETI DOK PRI SCH',
                'NYAIGESA ELCK PRI SCH',
                'MANG\'ONG\'O ELCK PRI SCH',
                'NYASORE MARKET',
            ],
            'BOGICHORA' => [
                'BOSIANGO ELCK PRI SCH',
                'MAKAIRO DEB PRI SCH',
                'IBUCHA DEB PRI SCH',
                'SIRONGA DEB PRI SCH',
                'KENYAMBI DEB PRI SCH',
                'OTANYORE ELCK PRI SCH',
                'ETONO DOK PRI SCH',
                'NYAMOTENTEMI DOK PRI SCH',
                'GIANCHORE PAG PRI SCH',
                'NYAISA DOK PRI SCH',
                'BOMORITO PAG PRI SCH',
                'EMBONGA DOK PRI SCH',
                'BONYUNYU SDA PRI SCH',
                'NYAMERU DEB PRI SCH',
                'IKURUCHA DOK PRI SCH',
                'IKONGE DEB PRI SCH',
                'OMOSASA DEB PRI SCH',
                'GETARE TBC (TEA BUYING CENTRE)',
                'GETA PAG PRI SCH',
                'MONGORISIA DOK PRI SCH',
                'KIAMBERE DEB PRI SCH',
                'EKERAMA DEB PRI SCH',
                'RAMBA ELCK PRI SCH',
                'MARINDI DEB PRI SCH',
            ],
            'BOSAMARO' => [
                'NYANTARO DOK PRI SCH',
                'KIANYABAO DEB PRI SCH',
                'KIANG\'INDA DEB PRI SCH',
                'RIAMANDERE DEB PRI SCH',
                'NYAKORIA DEB PRI SCH',
                'NYACHOGOCHOGO DEB PRI SCH',
                'GUCHA SDA PRI SCH',
                'MORUGA ELCK PRI SCH',
                'KIANUNGU PAG PRI SCH',
                'TINGA DOK PRI SCH',
                'GESIAGA DEB PRI SCH',
                'KUURA DEB PRI SCH',
                'GIRIGIRI DEB PRI SCH',
                'NYANGENA TBC (TEA BUYING CENTRE)',
                'EKORO PAG PRI SCH',
                'RIAKIMAI DEB PRI SCH',
                'KEGOGI DEB PRI SCH',
                'IGENAITAMBE DEB PRI SCH',
                'NYAGACHI DEB PRIMARY SCHOOL',
                'MOTAGARA DEB PRIMARY SCHOOL',
                'ENCHORO DOK PRIMARY SCHOOL',
                'NYANTURAGO PRIMARY SCHOOL',
                'IKOBE TEA BUYING CENTRE',
            ],
            'BONYAMATUTA' => [
                'KEBIRIGO SDA PRI SCH',
                'NYAKEORE DEB PRI SCH',
                'MOBAMBA DOK PRI SCH',
                'RIASINDANI DEB PRI SCH',
                'KIANYABONGERE PAG PRI SCH',
                'KABATIA DEB PRI SCH',
                'NYAINOGU DEB PRI SCH',
                'RIRUMI SDA PRI SCH',
                'EKENYORO DEB PRI SCH',
                'KENYENYA SDA PRI SCH',
                'NYAKEMINCHA D.O.K PRI. SCH.',
                'NYABISIMBA DEB PRI SCH',
                'NYAMWETUREKO DOK PRI SCH',
                'BOSOSE ELCK PRI SCH',
            ],
            'TOWNSHIP' => [
                'BOMONDO C.O.G PRI SCH',
                'NYAIRICHA DEB PRI SCH',
                'GESORE PAG PRI SCH',
                'NYAMIRA DEB PRI SCH',
                'TENTE COG PRI SCH',
                'NYANGOSO DEB PRI SCH',
                'BUNDO DOK PRI SCH',
            ],
        ];

        foreach ($data as $ward => $stations) {
            foreach ($stations as $station) {
                Trainee::create([
                    'name' => 'Sample Name', // Adjust as needed
                    'id_number' => 'Sample ID', // Adjust as needed
                    'phone_number' => 'Sample Phone', // Adjust as needed
                    'polling_station' => $station,
                    'role' => 'Sample Role', // Adjust as needed
                    'ward' => $ward,
                ]);
            }
        }
    }
}
