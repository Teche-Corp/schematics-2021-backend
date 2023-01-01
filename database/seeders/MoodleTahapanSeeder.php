<?php


namespace Database\Seeders;


use App\Models\TahapanEnum;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MoodleTahapanSeeder extends Seeder
{
    private array $data = [
        [
            "id" => 1,
            "team_id" => 1,
            "name" => "DREAM CHASER",
            "username" => "alyaanissa1",
            "password" => "VM#7UmxR",
            "status" => "Penyisihan"
        ],
        [
            "id" => 2,
            "team_id" => 5,
            "name" => "Pensil 2B",
            "username" => "muhammadbuyung5",
            "password" => "MzNRe-5h",
            "status" => "Penyisihan"
        ],
        [
            "id" => 3,
            "team_id" => 6,
            "name" => "Ozzma Kappa",
            "username" => "latishabesariani6",
            "password" => "JQE-8WyS",
            "status" => "Penyisihan"
        ],
        [
            "id" => 4,
            "team_id" => 7,
            "name" => "BICA",
            "username" => "bintangpria7",
            "password" => "YG2X-CgJ",
            "status" => "Penyisihan"
        ],
        [
            "id" => 5,
            "team_id" => 14,
            "name" => "PARADUTA",
            "username" => "kyladevanda14",
            "password" => "XNF-g7qG",
            "status" => "Penyisihan"
        ],
        [
            "id" => 6,
            "team_id" => 21,
            "name" => "Chrono",
            "username" => "mohdimas21",
            "password" => "T5m*hA9B",
            "status" => "Penyisihan"
        ],
        [
            "id" => 7,
            "team_id" => 25,
            "name" => "BRAVO",
            "username" => "nadiaoctavia25",
            "password" => "DH#5bYkR",
            "status" => "Penyisihan"
        ],
        [
            "id" => 8,
            "team_id" => 24,
            "name" => "the strom squad (tss)",
            "username" => "wildamutiara24",
            "password" => "DF8yL*wu",
            "status" => "Penyisihan"
        ],
        [
            "id" => 9,
            "team_id" => 26,
            "name" => "Parama",
            "username" => "mariaclementia26",
            "password" => "vS2-cnKT",
            "status" => "Penyisihan"
        ],
        [
            "id" => 10,
            "team_id" => 20,
            "name" => "kolif",
            "username" => "akmalramadhan20",
            "password" => "j*g4rK87",
            "status" => "Penyisihan"
        ],
        [
            "id" => 11,
            "team_id" => 29,
            "name" => "Chaos at the Palace",
            "username" => "mochammadnadhif29",
            "password" => "ZK-2gR4y",
            "status" => "Penyisihan"
        ],
        [
            "id" => 12,
            "team_id" => 34,
            "name" => "XZ 1",
            "username" => "roytjokroutomo34",
            "password" => "F9hHK*Dq",
            "status" => "Penyisihan"
        ],
        [
            "id" => 13,
            "team_id" => 30,
            "name" => "wakakwkka",
            "username" => "rahmadramadhan30",
            "password" => "eJmT5d#r",
            "status" => "Penyisihan"
        ],
        [
            "id" => 14,
            "team_id" => 41,
            "name" => "ISMAYA 2",
            "username" => "salmanrobith41",
            "password" => "f2DJaq*Q",
            "status" => "Penyisihan"
        ],
        [
            "id" => 15,
            "team_id" => 33,
            "name" => "Ciel",
            "username" => "mohamadmaulana33",
            "password" => "URY8j#eK",
            "status" => "Penyisihan"
        ],
        [
            "id" => 16,
            "team_id" => 61,
            "name" => "CORE TEAM",
            "username" => "muhammaddaris61",
            "password" => "G3q2#jMh",
            "status" => "Penyisihan"
        ],
        [
            "id" => 17,
            "team_id" => 64,
            "name" => "Warsep",
            "username" => "yusufardian64",
            "password" => "M*GQmc4z",
            "status" => "Penyisihan"
        ],
        [
            "id" => 18,
            "team_id" => 2,
            "name" => "ISMAYA",
            "username" => "jalaluddinassyuyuti2",
            "password" => "CQ#t6N9c",
            "status" => "Penyisihan"
        ],
        [
            "id" => 19,
            "team_id" => 86,
            "name" => "BrainStorm",
            "username" => "angelinenathania86",
            "password" => "F*97fVKC",
            "status" => "Penyisihan"
        ],
        [
            "id" => 20,
            "team_id" => 73,
            "name" => "Ackerman Squad",
            "username" => "raishaputri73",
            "password" => "m*d-3Q#R",
            "status" => "Penyisihan"
        ],
        [
            "id" => 21,
            "team_id" => 118,
            "name" => "ShinnakaT7",
            "username" => "kevintjokro118",
            "password" => "R5G2-qeM",
            "status" => "Penyisihan"
        ],
        [
            "id" => 22,
            "team_id" => 28,
            "name" => "Ilham and Riyan",
            "username" => "riyandacavin28",
            "password" => "gz#WJ9SR",
            "status" => "Penyisihan"
        ],
        [
            "id" => 23,
            "team_id" => 115,
            "name" => "GAPAPA OKE",
            "username" => "najladhia115",
            "password" => "Kwa#J7Qt",
            "status" => "Penyisihan"
        ],
        [
            "id" => 24,
            "team_id" => 132,
            "name" => "Ashiap",
            "username" => "rmnathen132",
            "password" => "YmT#gx7S",
            "status" => "Penyisihan"
        ],
        [
            "id" => 25,
            "team_id" => 138,
            "name" => "Deux De Amethyst",
            "username" => "javierfawwaz138",
            "password" => "S8u43-5z",
            "status" => "Penyisihan"
        ],
        [
            "id" => 26,
            "team_id" => 142,
            "name" => "PB",
            "username" => "ahmadfatih142",
            "password" => "wsuf8J*h",
            "status" => "Penyisihan"
        ],
        [
            "id" => 27,
            "team_id" => 133,
            "name" => "smasatik",
            "username" => "abdurrahmankhairi133",
            "password" => "Mt5J#Rg2",
            "status" => "Penyisihan"
        ],
        [
            "id" => 28,
            "team_id" => 144,
            "name" => "SMATEC IN",
            "username" => "putriyasmin144",
            "password" => "mHv3cQ#j",
            "status" => "Penyisihan"
        ],
        [
            "id" => 29,
            "team_id" => 124,
            "name" => "Aldebaran",
            "username" => "achmadfiky124",
            "password" => "Zk3#dybx",
            "status" => "Penyisihan"
        ],
        [
            "id" => 30,
            "team_id" => 150,
            "name" => "Chili",
            "username" => "cathedineelina150",
            "password" => "L-d39bFU",
            "status" => "Penyisihan"
        ],
        [
            "id" => 31,
            "team_id" => 139,
            "name" => "Modal Nekat",
            "username" => "aisyahputri139",
            "password" => "p98zN#QU",
            "status" => "Penyisihan"
        ],
        [
            "id" => 32,
            "team_id" => 154,
            "name" => "God's Favor",
            "username" => "jeremylimanto154",
            "password" => "U5n#Fsg-",
            "status" => "Penyisihan"
        ],
        [
            "id" => 33,
            "team_id" => 160,
            "name" => "a hundred percent",
            "username" => "sheilazharfa160",
            "password" => "k8j#ALCQ",
            "status" => "Penyisihan"
        ],
        [
            "id" => 34,
            "team_id" => 164,
            "name" => "NLC MBI AU",
            "username" => "mulianazarrachman164",
            "password" => "mRM#5-uU",
            "status" => "Penyisihan"
        ],
        [
            "id" => 35,
            "team_id" => 146,
            "name" => "Satwika Squad",
            "username" => "naufalrevaldy146",
            "password" => "L2Rt*5fq",
            "status" => "Penyisihan"
        ],
        [
            "id" => 36,
            "team_id" => 167,
            "name" => "Tim A SMAN 2 Nganjuk",
            "username" => "muhammadiqbal167",
            "password" => "vBECs8#p",
            "status" => "Penyisihan"
        ],
        [
            "id" => 37,
            "team_id" => 166,
            "name" => "Red Code",
            "username" => "rifdamaulidya166",
            "password" => "vf-B8CLc",
            "status" => "Penyisihan"
        ],
        [
            "id" => 38,
            "team_id" => 176,
            "name" => "Crizen",
            "username" => "hasrifayadh176",
            "password" => "D-3rwjNg",
            "status" => "Penyisihan"
        ],
        [
            "id" => 39,
            "team_id" => 178,
            "name" => "Pejuang Veteran",
            "username" => "muhammadfath178",
            "password" => "cEZ*s5Uf",
            "status" => "Penyisihan"
        ],
        [
            "id" => 40,
            "team_id" => 180,
            "name" => "HidupTenang",
            "username" => "henrikusnikolas180",
            "password" => "X2cfa#m6",
            "status" => "Penyisihan"
        ],
        [
            "id" => 41,
            "team_id" => 184,
            "name" => "strong",
            "username" => "yanuareka184",
            "password" => "VAu6#p-P",
            "status" => "Penyisihan"
        ],
        [
            "id" => 42,
            "team_id" => 187,
            "name" => "Masker pilof",
            "username" => "astriddebora187",
            "password" => "F*94rkPm",
            "status" => "Penyisihan"
        ],
        [
            "id" => 43,
            "team_id" => 151,
            "name" => "Purba",
            "username" => "ikadek151",
            "password" => "UnBg-L3t",
            "status" => "Penyisihan"
        ],
        [
            "id" => 44,
            "team_id" => 203,
            "name" => "Keli khab",
            "username" => "feliciastewennie203",
            "password" => "Q5w4EC-t",
            "status" => "Penyisihan"
        ],
        [
            "id" => 45,
            "team_id" => 112,
            "name" => "Amogus Team",
            "username" => "krisnarizky112",
            "password" => "aBwJ4*Kg",
            "status" => "Penyisihan"
        ],
        [
            "id" => 46,
            "team_id" => 205,
            "name" => "Binti Hayatul Mufidah",
            "username" => "bintihayatul205",
            "password" => "akXw-6FB",
            "status" => "Penyisihan"
        ],
        [
            "id" => 47,
            "team_id" => 211,
            "name" => "Aviothic",
            "username" => "nicholasandrew211",
            "password" => "Kv-TZ9m5",
            "status" => "Penyisihan"
        ],
        [
            "id" => 48,
            "team_id" => 199,
            "name" => "ALVA CHIPS",
            "username" => "dewiaisyah199",
            "password" => "w-rF3N9u",
            "status" => "Penyisihan"
        ],
        [
            "id" => 49,
            "team_id" => 204,
            "name" => "Sembarang",
            "username" => "muhammadadeva204",
            "password" => "Px5HL#7F",
            "status" => "Penyisihan"
        ],
        [
            "id" => 50,
            "team_id" => 215,
            "name" => "SansDL",
            "username" => "luthfanaryananda215",
            "password" => "J-zDh7Vt",
            "status" => "Penyisihan"
        ],
        [
            "id" => 51,
            "team_id" => 217,
            "name" => "outstanding.exe",
            "username" => "daffaazhar217",
            "password" => "dc#*L3F9",
            "status" => "Penyisihan"
        ],
        [
            "id" => 52,
            "team_id" => 214,
            "name" => "Winning",
            "username" => "anandaindzar214",
            "password" => "b-qj8WQn",
            "status" => "Penyisihan"
        ],
        [
            "id" => 53,
            "team_id" => 216,
            "name" => "preman girang ilmu",
            "username" => "bobyprathama216",
            "password" => "DjC-9KT8",
            "status" => "Penyisihan"
        ],
        [
            "id" => 54,
            "team_id" => 225,
            "name" => "SNK",
            "username" => "fairuuzazmi225",
            "password" => "Z9mD8*WA",
            "status" => "Penyisihan"
        ],
        [
            "id" => 55,
            "team_id" => 226,
            "name" => "Mirage Number",
            "username" => "kadityarakan226",
            "password" => "U#sn*3d4",
            "status" => "Penyisihan"
        ],
        [
            "id" => 56,
            "team_id" => 227,
            "name" => "M2KMers",
            "username" => "yusuffaishal227",
            "password" => "hRmd*7Vq",
            "status" => "Penyisihan"
        ],
        [
            "id" => 57,
            "team_id" => 231,
            "name" => "Bintang",
            "username" => "rizkimia231",
            "password" => "Mhe-J9wY",
            "status" => "Penyisihan"
        ],
        [
            "id" => 58,
            "team_id" => 234,
            "name" => "Bulan",
            "username" => "alexcaamanda234",
            "password" => "GSH8xt*5",
            "status" => "Penyisihan"
        ],
        [
            "id" => 59,
            "team_id" => 235,
            "name" => "Alpha Wolf",
            "username" => "alifianur235",
            "password" => "dF#eqL3V",
            "status" => "Penyisihan"
        ],
        [
            "id" => 60,
            "team_id" => 230,
            "name" => "ShoullNadd",
            "username" => "muhammadsholihul230",
            "password" => "Qx-4dGAm",
            "status" => "Penyisihan"
        ],
        [
            "id" => 61,
            "team_id" => 238,
            "name" => "God Of Highschool",
            "username" => "muhammadhanif238",
            "password" => "gq7R-beA",
            "status" => "Penyisihan"
        ],
        [
            "id" => 62,
            "team_id" => 229,
            "name" => "adibrata",
            "username" => "mohammadalvin229",
            "password" => "uNe7Y6#Q",
            "status" => "Penyisihan"
        ],
        [
            "id" => 63,
            "team_id" => 240,
            "name" => "RANDANG",
            "username" => "miftahfarid240",
            "password" => "cJH*F9SU",
            "status" => "Penyisihan"
        ],
        [
            "id" => 64,
            "team_id" => 242,
            "name" => "Nasi Bungkus",
            "username" => "tamamfajar242",
            "password" => "Bn4P3X#7",
            "status" => "Penyisihan"
        ],
        [
            "id" => 65,
            "team_id" => 245,
            "name" => "Astrowtz",
            "username" => "henamahira245",
            "password" => "mK#e37Zf",
            "status" => "Penyisihan"
        ],
        [
            "id" => 66,
            "team_id" => 241,
            "name" => "Drasthaprana",
            "username" => "elitasalsabila241",
            "password" => "Pm7CTt-n",
            "status" => "Penyisihan"
        ],
        [
            "id" => 67,
            "team_id" => 255,
            "name" => "Fawkes",
            "username" => "briantimothy255",
            "password" => "B8h2k4#X",
            "status" => "Penyisihan"
        ],
        [
            "id" => 68,
            "team_id" => 222,
            "name" => "Kursi",
            "username" => "ricardosupriyanto222",
            "password" => "M-T9kyRj",
            "status" => "Penyisihan"
        ],
        [
            "id" => 69,
            "team_id" => 275,
            "name" => "11 Bahasa",
            "username" => "shilfiyanahmad275",
            "password" => "B#5Rke2Q",
            "status" => "Penyisihan"
        ],
        [
            "id" => 70,
            "team_id" => 288,
            "name" => "THY",
            "username" => "meiyasfahimmuhsin288",
            "password" => "E#6gs8qU",
            "status" => "Penyisihan"
        ],
        [
            "id" => 71,
            "team_id" => 289,
            "name" => "ARDUNK",
            "username" => "rhakenshaquille289",
            "password" => "QKfjV-9H",
            "status" => "Penyisihan"
        ],
        [
            "id" => 72,
            "team_id" => 293,
            "name" => "SMAN 1 Tambun Selatan",
            "username" => "anindyaroro293",
            "password" => "YS#jLH25",
            "status" => "Penyisihan"
        ],
        [
            "id" => 73,
            "team_id" => 259,
            "name" => "Entah",
            "username" => "titaathalia259",
            "password" => "A*T5skqE",
            "status" => "Penyisihan"
        ],
        [
            "id" => 74,
            "team_id" => 300,
            "name" => "Amerta",
            "username" => "dynacahya300",
            "password" => "C*tc#R76",
            "status" => "Penyisihan"
        ],
        [
            "id" => 75,
            "team_id" => 285,
            "name" => "ptnjourney",
            "username" => "dwijayantirahayuningtyas285",
            "password" => "HXx5-bk#",
            "status" => "Penyisihan"
        ],
        [
            "id" => 76,
            "team_id" => 312,
            "name" => "Roffourt",
            "username" => "daffamuyassar312",
            "password" => "rwM6-A54",
            "status" => "Penyisihan"
        ],
        [
            "id" => 77,
            "team_id" => 315,
            "name" => "COMPUTER SCIENCE MASA DEPAN",
            "username" => "felixrafael315",
            "password" => "V#M8yj3N",
            "status" => "Penyisihan"
        ],
        [
            "id" => 78,
            "team_id" => 321,
            "name" => "Tokek Tokekan",
            "username" => "cornelliuspowellnandus321",
            "password" => "T-h7zKJB",
            "status" => "Penyisihan"
        ],
        [
            "id" => 79,
            "team_id" => 106,
            "name" => "LULUS SNMPTN 22",
            "username" => "machzenorabhayangkara106",
            "password" => "r#2xS7QC",
            "status" => "Penyisihan"
        ],
        [
            "id" => 80,
            "team_id" => 330,
            "name" => "VANITAS",
            "username" => "pandukaya330",
            "password" => "uhC84G*3",
            "status" => "Penyisihan"
        ],
        [
            "id" => 81,
            "team_id" => 326,
            "name" => "GoGoSchematics",
            "username" => "davidmaynard326",
            "password" => "NC3G-eE8",
            "status" => "Penyisihan"
        ],
        [
            "id" => 82,
            "team_id" => 335,
            "name" => "Anak Ambis",
            "username" => "galihnur335",
            "password" => "ue7*ZU35",
            "status" => "Penyisihan"
        ],
        [
            "id" => 83,
            "team_id" => 332,
            "name" => "Running Man",
            "username" => "muhammadfaris332",
            "password" => "hK#LBE9b",
            "status" => "Penyisihan"
        ],
        [
            "id" => 84,
            "team_id" => 351,
            "name" => "MABA ITS AMIN",
            "username" => "janetdeby351",
            "password" => "dWmC#F2x",
            "status" => "Penyisihan"
        ],
        [
            "id" => 85,
            "team_id" => 352,
            "name" => "menang",
            "username" => "aliceangela352",
            "password" => "bX5yxj-U",
            "status" => "Penyisihan"
        ],
        [
            "id" => 86,
            "team_id" => 346,
            "name" => "Tim Bintang",
            "username" => "nabiladhea346",
            "password" => "prxYD2#u",
            "status" => "Penyisihan"
        ],
        [
            "id" => 87,
            "team_id" => 362,
            "name" => "ChiTeam",
            "username" => "nouvalroyhan362",
            "password" => "aQ5P*ktZ",
            "status" => "Penyisihan"
        ],
        [
            "id" => 88,
            "team_id" => 366,
            "name" => "Disconnected",
            "username" => "nyomanwiprayanka366",
            "password" => "huPf#p4H",
            "status" => "Penyisihan"
        ],
        [
            "id" => 89,
            "team_id" => 232,
            "name" => "Doline",
            "username" => "januarsyahakbar232",
            "password" => "v7Hr#wuA",
            "status" => "Penyisihan"
        ],
        [
            "id" => 90,
            "team_id" => 284,
            "name" => "CGWH",
            "username" => "muhammadsyawal284",
            "password" => "faQ#kR6s",
            "status" => "Penyisihan"
        ],
        [
            "id" => 91,
            "team_id" => 361,
            "name" => "Al-Rammah",
            "username" => "muhammadhanif361",
            "password" => "Pcx*QB8p",
            "status" => "Penyisihan"
        ],
        [
            "id" => 92,
            "team_id" => 286,
            "name" => "Ghazala",
            "username" => "finestangela286",
            "password" => "sNM#z5EQ",
            "status" => "Penyisihan"
        ],
        [
            "id" => 93,
            "team_id" => 377,
            "name" => "Serah U",
            "username" => "davinghani377",
            "password" => "E#rgW7Bt",
            "status" => "Penyisihan"
        ],
        [
            "id" => 94,
            "team_id" => 379,
            "name" => "SMAN 3 Blitar",
            "username" => "azukhrufsaktian379",
            "password" => "mhWM9L*r",
            "status" => "Penyisihan"
        ],
        [
            "id" => 95,
            "team_id" => 387,
            "name" => "buiin_hebat_reborn",
            "username" => "fawwasaldy387",
            "password" => "BW-E#v6P",
            "status" => "Penyisihan"
        ],
        [
            "id" => 96,
            "team_id" => 382,
            "name" => "DxCode",
            "username" => "fakihhabib382",
            "password" => "Rt7gq#e5",
            "status" => "Penyisihan"
        ],
        [
            "id" => 97,
            "team_id" => 395,
            "name" => "NOTION",
            "username" => "dhimasputra395",
            "password" => "JS6*XQu4",
            "status" => "Penyisihan"
        ],
        [
            "id" => 98,
            "team_id" => 396,
            "name" => "ARIF",
            "username" => "arifrakhmat396",
            "password" => "x*-L87dQ",
            "status" => "Penyisihan"
        ],
        [
            "id" => 99,
            "team_id" => 402,
            "name" => "UBI REBUS",
            "username" => "zahranur402",
            "password" => "B#H6*Gmr",
            "status" => "Penyisihan"
        ],
        [
            "id" => 100,
            "team_id" => 404,
            "name" => "Team A",
            "username" => "malin404",
            "password" => "z8*6mqEg",
            "status" => "Penyisihan"
        ],
        [
            "id" => 101,
            "team_id" => 412,
            "name" => "ZV",
            "username" => "zaimaydin412",
            "password" => "H*wcbm38",
            "status" => "Penyisihan"
        ],
        [
            "id" => 102,
            "team_id" => 417,
            "name" => "Lela",
            "username" => "letitiaelectra417",
            "password" => "UeCp24-7",
            "status" => "Penyisihan"
        ],
        [
            "id" => 103,
            "team_id" => 423,
            "name" => "Almah",
            "username" => "adhillasalsabila423",
            "password" => "C*8YseN-",
            "status" => "Penyisihan"
        ],
        [
            "id" => 104,
            "team_id" => 398,
            "name" => "Lintang-Amel",
            "username" => "amaliarohmah398",
            "password" => "W5mCx*cD",
            "status" => "Penyisihan"
        ],
        [
            "id" => 105,
            "team_id" => 431,
            "name" => "Takgentokjos",
            "username" => "augistaeksofon431",
            "password" => "zV*h8pwj",
            "status" => "Penyisihan"
        ],
        [
            "id" => 106,
            "team_id" => 438,
            "name" => "Hydrant",
            "username" => "mohammadarkananta438",
            "password" => "mPWj-u9T",
            "status" => "Penyisihan"
        ],
        [
            "id" => 107,
            "team_id" => 162,
            "name" => "TY Track",
            "username" => "chalicetafazanuari162",
            "password" => "ty4DvX*M",
            "status" => "Penyisihan"
        ],
        [
            "id" => 108,
            "team_id" => 443,
            "name" => "SMAN 3 SAMARINDA TIM 2",
            "username" => "muhammadfirsto443",
            "password" => "H6dN#x7Z",
            "status" => "Penyisihan"
        ],
        [
            "id" => 109,
            "team_id" => 388,
            "name" => "m4th tim",
            "username" => "muhammadramadhan388",
            "password" => "Nm2BW#zX",
            "status" => "Penyisihan"
        ],
        [
            "id" => 110,
            "team_id" => 3,
            "name" => "mak10",
            "username" => "maulanaafzaal3",
            "password" => "Gf*5ZJSt",
            "status" => "Penyisihan"
        ],
        [
            "id" => 111,
            "team_id" => 446,
            "name" => "Doryuu",
            "username" => "kgsraka446",
            "password" => "YAWfL6-g",
            "status" => "Penyisihan"
        ],
        [
            "id" => 112,
            "team_id" => 451,
            "name" => "Bismillah huha",
            "username" => "muhammadzaidan451",
            "password" => "eR*N#2Tu",
            "status" => "Penyisihan"
        ],
        [
            "id" => 113,
            "team_id" => 364,
            "name" => "YOHLI",
            "username" => "melindalouisa364",
            "password" => "F#E7hnj*",
            "status" => "Penyisihan"
        ],
        [
            "id" => 114,
            "team_id" => 455,
            "name" => "ACTeam",
            "username" => "rasyidaturrahma455",
            "password" => "EkD-d3qp",
            "status" => "Penyisihan"
        ],
        [
            "id" => 115,
            "team_id" => 458,
            "name" => "Andromeda",
            "username" => "riaamelia458",
            "password" => "atA9*53g",
            "status" => "Penyisihan"
        ],
        [
            "id" => 116,
            "team_id" => 428,
            "name" => "Greatest",
            "username" => "lauravirginia428",
            "password" => "f9je*NGg",
            "status" => "Penyisihan"
        ],
        [
            "id" => 117,
            "team_id" => 476,
            "name" => "Santiwan Hebat",
            "username" => "mochilham476",
            "password" => "Au*n37Hz",
            "status" => "Penyisihan"
        ],
        [
            "id" => 118,
            "team_id" => 239,
            "name" => "Smart.six",
            "username" => "novianaidil239",
            "password" => "B-bFR6te",
            "status" => "Penyisihan"
        ],
        [
            "id" => 119,
            "team_id" => 491,
            "name" => "chocolate matcha",
            "username" => "naurakhashia491",
            "password" => "WzDN4#8c",
            "status" => "Penyisihan"
        ],
        [
            "id" => 120,
            "team_id" => 479,
            "name" => "VICIOUS",
            "username" => "danielstevanus479",
            "password" => "tzG2*pMw",
            "status" => "Penyisihan"
        ],
        [
            "id" => 121,
            "team_id" => 499,
            "name" => "cussons",
            "username" => "sandroc499",
            "password" => "p*Wx98DN",
            "status" => "Penyisihan"
        ],
        [
            "id" => 122,
            "team_id" => 502,
            "name" => "pulu pulu",
            "username" => "fillesupria502",
            "password" => "Qd#9As3D",
            "status" => "Penyisihan"
        ],
        [
            "id" => 123,
            "team_id" => 507,
            "name" => "SATPUR",
            "username" => "satyafirmansyah507",
            "password" => "LP*8eyDu",
            "status" => "Penyisihan"
        ],
        [
            "id" => 124,
            "team_id" => 471,
            "name" => "YesWeCan",
            "username" => "dominikusdatas471",
            "password" => "yqG#wa7S",
            "status" => "Penyisihan"
        ],
        [
            "id" => 125,
            "team_id" => 277,
            "name" => "WANGY WANGYY",
            "username" => "marvin277",
            "password" => "UZE-*8pk",
            "status" => "Penyisihan"
        ],
        [
            "id" => 126,
            "team_id" => 508,
            "name" => "TIM NGAB",
            "username" => "andrufalah508",
            "password" => "nZ-Sk38*",
            "status" => "Penyisihan"
        ],
        [
            "id" => 127,
            "team_id" => 505,
            "name" => "Awan9",
            "username" => "rasyaintishar505",
            "password" => "jS4Cg9*f",
            "status" => "Penyisihan"
        ],
        [
            "id" => 128,
            "team_id" => 518,
            "name" => "Bismillah",
            "username" => "nailahazzahra518",
            "password" => "tS-UG9Mg",
            "status" => "Penyisihan"
        ],
        [
            "id" => 129,
            "team_id" => 520,
            "name" => "ORION",
            "username" => "audreyhasian520",
            "password" => "ezJ4*hgj",
            "status" => "Penyisihan"
        ],
        [
            "id" => 130,
            "team_id" => 519,
            "name" => "007",
            "username" => "junizarali519",
            "password" => "BeYa#U96",
            "status" => "Penyisihan"
        ],
        [
            "id" => 131,
            "team_id" => 511,
            "name" => "TDR 3000",
            "username" => "helmyluqmanulhakim511",
            "password" => "qSz*T57B",
            "status" => "Penyisihan"
        ],
        [
            "id" => 132,
            "team_id" => 521,
            "name" => "wkwk",
            "username" => "janiceangela521",
            "password" => "DvC*Hf69",
            "status" => "Penyisihan"
        ],
        [
            "id" => 133,
            "team_id" => 513,
            "name" => "Prime",
            "username" => "deaprimatama513",
            "password" => "UN2e-wE7",
            "status" => "Penyisihan"
        ],
        [
            "id" => 134,
            "team_id" => 524,
            "name" => "BENCIIRAWAN",
            "username" => "bradleyxavier524",
            "password" => "hD6E#5aj",
            "status" => "Penyisihan"
        ],
        [
            "id" => 135,
            "team_id" => 528,
            "name" => "Phyton",
            "username" => "sevayaheayuning528",
            "password" => "LUB7Xz*Z",
            "status" => "Penyisihan"
        ],
        [
            "id" => 136,
            "team_id" => 526,
            "name" => "Pitsus",
            "username" => "nicholasirvin526",
            "password" => "FB3Ck-hV",
            "status" => "Penyisihan"
        ],
        [
            "id" => 137,
            "team_id" => 439,
            "name" => "UnreacheDreams",
            "username" => "aldichandra439",
            "password" => "JX7*dD6V",
            "status" => "Penyisihan"
        ],
        [
            "id" => 138,
            "team_id" => 539,
            "name" => "FA TEAM",
            "username" => "ferroleonardo539",
            "password" => "VZq2Sx*b",
            "status" => "Penyisihan"
        ],
        [
            "id" => 139,
            "team_id" => 546,
            "name" => "Dempo St-Albertus",
            "username" => "krisnawaluyo546",
            "password" => "Gd9EgD-6",
            "status" => "Penyisihan"
        ],
        [
            "id" => 140,
            "team_id" => 545,
            "name" => "Jansen Ken Pegrasio",
            "username" => "jansenken545",
            "password" => "BU7em*3y",
            "status" => "Penyisihan"
        ],
        [
            "id" => 141,
            "team_id" => 551,
            "name" => "Ban Nana",
            "username" => "vinaldotambunan551",
            "password" => "vPc#QL5s",
            "status" => "Penyisihan"
        ],
        [
            "id" => 142,
            "team_id" => 533,
            "name" => "Asteria",
            "username" => "khalisanajla533",
            "password" => "Z#XbMf2d",
            "status" => "Penyisihan"
        ],
        [
            "id" => 143,
            "team_id" => 548,
            "name" => "Poniers team",
            "username" => "luciagiovani548",
            "password" => "etk-3Bcp",
            "status" => "Penyisihan"
        ],
        [
            "id" => 144,
            "team_id" => 556,
            "name" => "Camarade",
            "username" => "desvinarahmalia556",
            "password" => "jEmV-86z",
            "status" => "Penyisihan"
        ],
        [
            "id" => 145,
            "team_id" => 550,
            "name" => "G.O.A.T",
            "username" => "farrasarrafi550",
            "password" => "ZtL6-T2B",
            "status" => "Penyisihan"
        ],
        [
            "id" => 146,
            "team_id" => 569,
            "name" => "KIMS TEAM",
            "username" => "saadabdul569",
            "password" => "B#6H*yG-",
            "status" => "Penyisihan"
        ],
        [
            "id" => 147,
            "team_id" => 558,
            "name" => "Thewinner",
            "username" => "desakayu558",
            "password" => "jex6K*Q9",
            "status" => "Penyisihan"
        ],
        [
            "id" => 148,
            "team_id" => 572,
            "name" => "Notions",
            "username" => "hannanafif572",
            "password" => "q#e3FhCZ",
            "status" => "Penyisihan"
        ],
        [
            "id" => 149,
            "team_id" => 523,
            "name" => "Kamihokikamibisa",
            "username" => "ezranoveraldo523",
            "password" => "pdm5rQ*Z",
            "status" => "Penyisihan"
        ],
        [
            "id" => 150,
            "team_id" => 515,
            "name" => "CrazyDiamonds",
            "username" => "joshuanathanael515",
            "password" => "b*LdJ3h4",
            "status" => "Penyisihan"
        ],
        [
            "id" => 151,
            "team_id" => 578,
            "name" => "MAI 01",
            "username" => "nabilawindy578",
            "password" => "hAN-n5w*",
            "status" => "Penyisihan"
        ],
        [
            "id" => 152,
            "team_id" => 580,
            "name" => "Flat",
            "username" => "rafaelbenedictus580",
            "password" => "AE*9Bwm7",
            "status" => "Penyisihan"
        ],
        [
            "id" => 153,
            "team_id" => 281,
            "name" => "Only Seventeen",
            "username" => "maulanazakky281",
            "password" => "sLd7Y#mt",
            "status" => "Penyisihan"
        ],
        [
            "id" => 154,
            "team_id" => 583,
            "name" => "Ez4Us",
            "username" => "favianizza583",
            "password" => "uf5E*6sq",
            "status" => "Penyisihan"
        ],
        [
            "id" => 155,
            "team_id" => 573,
            "name" => "Sing Penting Yakin",
            "username" => "rakhafauza573",
            "password" => "r6UZ#acb",
            "status" => "Penyisihan"
        ],
        [
            "id" => 156,
            "team_id" => 590,
            "name" => "xiboba",
            "username" => "adelinegrace590",
            "password" => "Sz9Y-X#V",
            "status" => "Penyisihan"
        ],
        [
            "id" => 157,
            "team_id" => 535,
            "name" => "Attanwir",
            "username" => "ricoubaidillah535",
            "password" => "SB*bHa7-",
            "status" => "Penyisihan"
        ],
        [
            "id" => 158,
            "team_id" => 531,
            "name" => "NeverGonnaGiveYouUp",
            "username" => "kimiharisen531",
            "password" => "Q2G*7cvg",
            "status" => "Penyisihan"
        ],
        [
            "id" => 159,
            "team_id" => 598,
            "name" => "Peluang",
            "username" => "adeliatanalina598",
            "password" => "D-9ZkPvx",
            "status" => "Penyisihan"
        ],
        [
            "id" => 160,
            "team_id" => 599,
            "name" => "Endeavour",
            "username" => "muhammadkamal599",
            "password" => "EHN2ug#M",
            "status" => "Penyisihan"
        ],
        [
            "id" => 161,
            "team_id" => 593,
            "name" => "Tasik Muda",
            "username" => "fathoniubaidillah593",
            "password" => "Vg#c4bzr",
            "status" => "Penyisihan"
        ],
        [
            "id" => 162,
            "team_id" => 601,
            "name" => "Bounty Hunter",
            "username" => "kinantifauziah601",
            "password" => "Amyh#q7K",
            "status" => "Penyisihan"
        ],
        [
            "id" => 163,
            "team_id" => 555,
            "name" => "Team Yes",
            "username" => "muhammadilham555",
            "password" => "fqXB*4aN",
            "status" => "Penyisihan"
        ],
        [
            "id" => 164,
            "team_id" => 604,
            "name" => "Blue Eagles",
            "username" => "shallomotniel604",
            "password" => "u4k*zmHE",
            "status" => "Penyisihan"
        ],
        [
            "id" => 165,
            "team_id" => 530,
            "name" => "UncleMuscle",
            "username" => "calvinhartono530",
            "password" => "K5A9Q-kW",
            "status" => "Penyisihan"
        ],
        [
            "id" => 166,
            "team_id" => 606,
            "name" => "natus vincere",
            "username" => "adeliamei606",
            "password" => "hD8Mm7-Q",
            "status" => "Penyisihan"
        ],
        [
            "id" => 167,
            "team_id" => 562,
            "name" => "ToeTekDung",
            "username" => "jasonchristoven562",
            "password" => "b2j*qHET",
            "status" => "Penyisihan"
        ],
        [
            "id" => 168,
            "team_id" => 609,
            "name" => "Cucu Habibie",
            "username" => "muhammadnaufal609",
            "password" => "UzW9*sN8",
            "status" => "Penyisihan"
        ],
        [
            "id" => 169,
            "team_id" => 375,
            "name" => "LogicalZero",
            "username" => "ronreganyosua375",
            "password" => "utNQM3*H",
            "status" => "Penyisihan"
        ],
        [
            "id" => 170,
            "team_id" => 419,
            "name" => "DwiKaS",
            "username" => "fadlandwi419",
            "password" => "aR-K5s79",
            "status" => "Penyisihan"
        ],
        [
            "id" => 171,
            "team_id" => 579,
            "name" => "Tim Barokah",
            "username" => "muflihmunadil579",
            "password" => "hDnz*36L",
            "status" => "Penyisihan"
        ],
        [
            "id" => 172,
            "team_id" => 614,
            "name" => "BOSCA 2",
            "username" => "ahmadnibras614",
            "password" => "Zjhc*3Rm",
            "status" => "Penyisihan"
        ],
        [
            "id" => 173,
            "team_id" => 613,
            "name" => "BOSCA 1",
            "username" => "atharizzamuhammad613",
            "password" => "RkS3*Am8",
            "status" => "Penyisihan"
        ],
        [
            "id" => 174,
            "team_id" => 399,
            "name" => "Sunshine",
            "username" => "halizazia399",
            "password" => "wdHp-6Cf",
            "status" => "Penyisihan"
        ],
        [
            "id" => 175,
            "team_id" => 585,
            "name" => "uranus",
            "username" => "putrifebiyanti585",
            "password" => "Rb#2SeLa",
            "status" => "Penyisihan"
        ],
        [
            "id" => 176,
            "team_id" => 619,
            "name" => "Imbalance",
            "username" => "mohammadidris619",
            "password" => "dY2-fT#4",
            "status" => "Penyisihan"
        ],
        [
            "id" => 177,
            "team_id" => 612,
            "name" => "UHU",
            "username" => "rendiandria612",
            "password" => "W*3Zb29n",
            "status" => "Penyisihan"
        ],
        [
            "id" => 178,
            "team_id" => 620,
            "name" => "Megamaindung",
            "username" => "farhanadyansah620",
            "password" => "kMxAh#6d",
            "status" => "Penyisihan"
        ],
        [
            "id" => 179,
            "team_id" => 621,
            "name" => "Manut Dalane",
            "username" => "khoirulanam621",
            "password" => "gQ#Je6Sv",
            "status" => "Penyisihan"
        ],
        [
            "id" => 180,
            "team_id" => 622,
            "name" => "Hoki Hoki Bento",
            "username" => "malvinjonathan622",
            "password" => "Ku3J-4T*",
            "status" => "Penyisihan"
        ],
        [
            "id" => 181,
            "team_id" => 576,
            "name" => "WIBU",
            "username" => "mohnazril576",
            "password" => "wKyJF*2u",
            "status" => "Penyisihan"
        ],
        [
            "id" => 182,
            "team_id" => 365,
            "name" => "elfik",
            "username" => "eloratranggana365",
            "password" => "e*3Sc7f8",
            "status" => "Penyisihan"
        ],
        [
            "id" => 183,
            "team_id" => 624,
            "name" => "TOKI x IMO SMANSA PADANG",
            "username" => "haritsalfikri624",
            "password" => "Qr8*Cb3E",
            "status" => "Penyisihan"
        ],
        [
            "id" => 184,
            "team_id" => 607,
            "name" => "SMAN 1 JAKARTA",
            "username" => "chris208607",
            "password" => "Lc5gt-4P",
            "status" => "Penyisihan"
        ],
        [
            "id" => 185,
            "team_id" => 630,
            "name" => "Semoga Menang",
            "username" => "muhammadfatihul630",
            "password" => "T#BqfJ5g",
            "status" => "Penyisihan"
        ],
        [
            "id" => 186,
            "team_id" => 632,
            "name" => "mikymous",
            "username" => "achmadali632",
            "password" => "V-9mYXg8",
            "status" => "Penyisihan"
        ],
        [
            "id" => 187,
            "team_id" => 534,
            "name" => "Ryzen12 EMC",
            "username" => "fairuzardhan534",
            "password" => "d59*AGS2",
            "status" => "Penyisihan"
        ],
        [
            "id" => 188,
            "team_id" => 616,
            "name" => "Stardust",
            "username" => "muhammadbimatara616",
            "password" => "q9yv4C#D",
            "status" => "Penyisihan"
        ],
        [
            "id" => 189,
            "team_id" => 633,
            "name" => "generasi MATEDI",
            "username" => "sika633",
            "password" => "Nv*g-V3b",
            "status" => "Penyisihan"
        ],
        [
            "id" => 190,
            "team_id" => 637,
            "name" => "ESC",
            "username" => "muhamadlukman637",
            "password" => "t#DxL92R",
            "status" => "Penyisihan"
        ],
        [
            "id" => 191,
            "team_id" => 638,
            "name" => "Rookie",
            "username" => "ahmadwasis638",
            "password" => "R*vmF6eZ",
            "status" => "Penyisihan"
        ],
        [
            "id" => 192,
            "team_id" => 588,
            "name" => "Duo Kiyowo",
            "username" => "nailanurul588",
            "password" => "w3*MSQBD",
            "status" => "Penyisihan"
        ],
        [
            "id" => 193,
            "team_id" => 639,
            "name" => "winwin dong",
            "username" => "gabrielleclaire639",
            "password" => "tMc2s#54",
            "status" => "Penyisihan"
        ],
        [
            "id" => 194,
            "team_id" => 547,
            "name" => "SKYPER",
            "username" => "muhammadyazid547",
            "password" => "KJb*r2L9",
            "status" => "Penyisihan"
        ],
        [
            "id" => 195,
            "team_id" => 634,
            "name" => "Panthera",
            "username" => "safanadhira634",
            "password" => "Kx8Xs#BT",
            "status" => "Penyisihan"
        ],
        [
            "id" => 196,
            "team_id" => 581,
            "name" => "AYAMSI",
            "username" => "mochrifat581",
            "password" => "hwA#*6nN",
            "status" => "Penyisihan"
        ],
        [
            "id" => 197,
            "team_id" => 584,
            "name" => "alkali",
            "username" => "alannasyira584",
            "password" => "h#G5zPB7",
            "status" => "Penyisihan"
        ],
        [
            "id" => 198,
            "team_id" => 629,
            "name" => "Semangat guys",
            "username" => "syarifahnurus629",
            "password" => "f#4mPC-Y",
            "status" => "Penyisihan"
        ],
        [
            "id" => 199,
            "team_id" => 641,
            "name" => "Team Array",
            "username" => "syahmirzaar641",
            "password" => "Zt*JL4N8",
            "status" => "Penyisihan"
        ],
        [
            "id" => 200,
            "team_id" => 625,
            "name" => "Tokimo Revenger",
            "username" => "nabilhamzah625",
            "password" => "tyw5T7#h",
            "status" => "Penyisihan"
        ],
        [
            "id" => 201,
            "team_id" => 636,
            "name" => "Anthelizhon",
            "username" => "sitishofi636",
            "password" => "qUtc*Y7G",
            "status" => "Penyisihan"
        ],
        [
            "id" => 202,
            "team_id" => 645,
            "name" => "TIEDONJANO A",
            "username" => "fidyafattimiyah645",
            "password" => "UFm6#tMS",
            "status" => "Penyisihan"
        ],
        [
            "id" => 203,
            "team_id" => 646,
            "name" => "Skyline",
            "username" => "achmadnurrizal646",
            "password" => "X9DuYB#L",
            "status" => "Penyisihan"
        ],
        [
            "id" => 204,
            "team_id" => 648,
            "name" => "Venus",
            "username" => "reynitamaharani648",
            "password" => "mB9X*Rvg",
            "status" => "Penyisihan"
        ],
        [
            "id" => 205,
            "team_id" => 615,
            "name" => "Illustrious",
            "username" => "bagussubekti615",
            "password" => "KP4Nh#-U",
            "status" => "Penyisihan"
        ],
        [
            "id" => 206,
            "team_id" => 651,
            "name" => "SMAP",
            "username" => "marionalberta651",
            "password" => "AMUk#6pC",
            "status" => "Penyisihan"
        ],
        [
            "id" => 207,
            "team_id" => 643,
            "name" => "VIP",
            "username" => "raihanabdillah643",
            "password" => "n#G6w7fT",
            "status" => "Penyisihan"
        ],
        [
            "id" => 208,
            "team_id" => 610,
            "name" => "Gloria",
            "username" => "axelychlarabella610",
            "password" => "kcFB-h5q",
            "status" => "Penyisihan"
        ],
        [
            "id" => 209,
            "team_id" => 658,
            "name" => "Winner",
            "username" => "aludranadia658",
            "password" => "LbkcH#9q",
            "status" => "Penyisihan"
        ],
        [
            "id" => 210,
            "team_id" => 659,
            "name" => "BRAINLESS",
            "username" => "haidarali659",
            "password" => "cSK7*2-L",
            "status" => "Penyisihan"
        ],
        [
            "id" => 211,
            "team_id" => 627,
            "name" => "TIM MBI ARDA",
            "username" => "ardafadhli627",
            "password" => "B-rV7GZe",
            "status" => "Penyisihan"
        ],
        [
            "id" => 212,
            "team_id" => 660,
            "name" => "TIM MBI NAUFAL",
            "username" => "naufalmaula660",
            "password" => "z-UxFW3n",
            "status" => "Penyisihan"
        ],
        [
            "id" => 213,
            "team_id" => 617,
            "name" => "Logi-X",
            "username" => "umarzaki617",
            "password" => "F9YJvk-V",
            "status" => "Penyisihan"
        ],
        [
            "id" => 214,
            "team_id" => 661,
            "name" => "TIM MBI HAFID",
            "username" => "hafidaji661",
            "password" => "D*g5TWua",
            "status" => "Penyisihan"
        ],
        [
            "id" => 215,
            "team_id" => 662,
            "name" => "TIM MBI ALIF",
            "username" => "muhnur662",
            "password" => "c4QTe#RV",
            "status" => "Penyisihan"
        ],
        [
            "id" => 216,
            "team_id" => 663,
            "name" => "TIM MBI RIF'AT",
            "username" => "ahmadmiftahur663",
            "password" => "M*aKB796",
            "status" => "Penyisihan"
        ],
        [
            "id" => 217,
            "team_id" => 664,
            "name" => "TIM MBI HAYDAR",
            "username" => "ahmadhaydar664",
            "password" => "e#z4URjd",
            "status" => "Penyisihan"
        ],
        [
            "id" => 218,
            "team_id" => 665,
            "name" => "TIM MBI DANU",
            "username" => "prawiradanu665",
            "password" => "Z6rV5k*7",
            "status" => "Penyisihan"
        ],
        [
            "id" => 219,
            "team_id" => 666,
            "name" => "TIM MBI ISA",
            "username" => "syaifulisa666",
            "password" => "E-a3z6Rf",
            "status" => "Penyisihan"
        ],
        [
            "id" => 220,
            "team_id" => 667,
            "name" => "TIM MBI RIDLO",
            "username" => "ahmadtaufiqurrohman667",
            "password" => "T*tB9e73",
            "status" => "Penyisihan"
        ],
        [
            "id" => 221,
            "team_id" => 668,
            "name" => "TIM MBI FARIS",
            "username" => "muhfaris668",
            "password" => "dYq*c3Q2",
            "status" => "Penyisihan"
        ],
        [
            "id" => 222,
            "team_id" => 669,
            "name" => "TIM MBI NABIL",
            "username" => "nabilnaila669",
            "password" => "F4JpvH-9",
            "status" => "Penyisihan"
        ],
        [
            "id" => 223,
            "team_id" => 174,
            "name" => "SYAHRUL SUTET",
            "username" => "msyahrul174",
            "password" => "n#Xr9kcf",
            "status" => "Penyisihan"
        ],
        [
            "id" => 224,
            "team_id" => 173,
            "name" => "NLC MBI AU RAFI AKBAR",
            "username" => "mrafi173",
            "password" => "Tem28*W6",
            "status" => "Penyisihan"
        ],
        [
            "id" => 225,
            "team_id" => 195,
            "name" => "FAJRI SABIQ",
            "username" => "muhammadfajri195",
            "password" => "Mx*8XCW6",
            "status" => "Penyisihan"
        ],
        [
            "id" => 226,
            "team_id" => 673,
            "name" => "TIM MBI HELMY",
            "username" => "muhammadnizar673",
            "password" => "J3tnxk#2",
            "status" => "Penyisihan"
        ],
        [
            "id" => 227,
            "team_id" => 674,
            "name" => "TIM MBI FAIZ",
            "username" => "muhamadfaiz674",
            "password" => "mj#RM3uQ",
            "status" => "Penyisihan"
        ],
        [
            "id" => 228,
            "team_id" => 675,
            "name" => "TIM MBI ADAM",
            "username" => "adamrasyidi675",
            "password" => "TwU9Mf*X",
            "status" => "Penyisihan"
        ],
        [
            "id" => 229,
            "team_id" => 676,
            "name" => "TIM MBI ABQORI",
            "username" => "farisabqori676",
            "password" => "w4VcG#XL",
            "status" => "Penyisihan"
        ],
        [
            "id" => 230,
            "team_id" => 677,
            "name" => "TIM MBI FARAJ",
            "username" => "shahibulfaraj677",
            "password" => "aj9z-pY5",
            "status" => "Penyisihan"
        ],
        [
            "id" => 231,
            "team_id" => 678,
            "name" => "TIM MBI RAFFI",
            "username" => "mochraffi678",
            "password" => "A7r5j#dQ",
            "status" => "Penyisihan"
        ],
        [
            "id" => 232,
            "team_id" => 679,
            "name" => "Manut Pt 4",
            "username" => "hafshohatsilah679",
            "password" => "p-MWQ3zf",
            "status" => "Penyisihan"
        ],
        [
            "id" => 233,
            "team_id" => 626,
            "name" => "Muse Team",
            "username" => "ilfathubaydillah626",
            "password" => "MtVx9#aC",
            "status" => "Penyisihan"
        ],
        [
            "id" => 234,
            "team_id" => 635,
            "name" => "Quartz",
            "username" => "nathaniasabatina635",
            "password" => "EsN9-8RA",
            "status" => "Penyisihan"
        ],
        [
            "id" => 235,
            "team_id" => 683,
            "name" => "Adelabiba",
            "username" => "labibanareswari683",
            "password" => "resGW*2T",
            "status" => "Penyisihan"
        ],
        [
            "id" => 236,
            "team_id" => 655,
            "name" => "SMADA",
            "username" => "sarahwika655",
            "password" => "C5bMy*GS",
            "status" => "Penyisihan"
        ],
        [
            "id" => 237,
            "team_id" => 680,
            "name" => "Camaba its 22",
            "username" => "aliffiaisma680",
            "password" => "ULSx*H8v",
            "status" => "Penyisihan"
        ],
        [
            "id" => 238,
            "team_id" => 672,
            "name" => "Brown Sugar",
            "username" => "rafiislami672",
            "password" => "C*jGS6P2",
            "status" => "Penyisihan"
        ],
        [
            "id" => 239,
            "team_id" => 684,
            "name" => "Uniquely Chaotic",
            "username" => "avriltantica684",
            "password" => "K-yY9NV5",
            "status" => "Penyisihan"
        ],
        [
            "id" => 240,
            "team_id" => 685,
            "name" => "AMIGOS",
            "username" => "angelakirana685",
            "password" => "pBKm7u#n",
            "status" => "Penyisihan"
        ],
        [
            "id" => 241,
            "team_id" => 682,
            "name" => "GUD BOIS",
            "username" => "giovincentricels682",
            "password" => "GyX*Kw5A",
            "status" => "Penyisihan"
        ],
        [
            "id" => 242,
            "team_id" => 608,
            "name" => "SMANSA Tuban",
            "username" => "muhammadaqil608",
            "password" => "jT3QxJ*n",
            "status" => "Penyisihan"
        ],
        [
            "id" => 243,
            "team_id" => 559,
            "name" => "AkuHamilMas",
            "username" => "ericyoel559",
            "password" => "fPsh*2Dv",
            "status" => "Penyisihan"
        ],
        [
            "id" => 244,
            "team_id" => 689,
            "name" => "MARI BEJO",
            "username" => "muhammadfakhri689",
            "password" => "vxGtC-2X",
            "status" => "Penyisihan"
        ],
        [
            "id" => 245,
            "team_id" => 688,
            "name" => "Di Luar Kotak",
            "username" => "mikhaelxylon688",
            "password" => "Mkg7Z#NK",
            "status" => "Penyisihan"
        ],
        [
            "id" => 246,
            "team_id" => 628,
            "name" => "wangy",
            "username" => "ifaharum628",
            "password" => "K3Ey#pe7",
            "status" => "Penyisihan"
        ],
        [
            "id" => 247,
            "team_id" => 691,
            "name" => "Status Duo",
            "username" => "naulia691",
            "password" => "G-73wVZF",
            "status" => "Penyisihan"
        ],
        [
            "id" => 248,
            "team_id" => 692,
            "name" => "Anak Pak Dengklek",
            "username" => "nadityaputri692",
            "password" => "rG*9fHWw",
            "status" => "Penyisihan"
        ],
        [
            "id" => 249,
            "team_id" => 694,
            "name" => "HORE",
            "username" => "clarasista694",
            "password" => "U7r#yA9Y",
            "status" => "Penyisihan"
        ],
        [
            "id" => 250,
            "team_id" => 193,
            "name" => "BENIIZYAD",
            "username" => "sulthonakbar193",
            "password" => "f3MSj-gU",
            "status" => "Penyisihan"
        ],
        [
            "id" => 251,
            "team_id" => 642,
            "name" => "Comozzo 0.4",
            "username" => "khansaadilla642",
            "password" => "U7zn#N3-",
            "status" => "Penyisihan"
        ],
        [
            "id" => 252,
            "team_id" => 652,
            "name" => "BERANI BEDA",
            "username" => "gemparcahyo652",
            "password" => "G*8-D5aJ",
            "status" => "Penyisihan"
        ],
        [
            "id" => 253,
            "team_id" => 681,
            "name" => "Schwinghammer",
            "username" => "adamrayyan681",
            "password" => "w9*ecRb-",
            "status" => "Penyisihan"
        ],
        [
            "id" => 254,
            "team_id" => 700,
            "name" => "IBBAS PI",
            "username" => "cindyameilia700",
            "password" => "R6*U2b-D",
            "status" => "Penyisihan"
        ],
        [
            "id" => 255,
            "team_id" => 699,
            "name" => "VOLTA",
            "username" => "alfredoebenezer699",
            "password" => "HMePB*8u",
            "status" => "Penyisihan"
        ],
        [
            "id" => 256,
            "team_id" => 657,
            "name" => "Mystical",
            "username" => "renaldiagustyan657",
            "password" => "z9#frXgH",
            "status" => "Penyisihan"
        ],
        [
            "id" => 257,
            "team_id" => 644,
            "name" => "Rapture",
            "username" => "parittavicky644",
            "password" => "E#dR7qwM",
            "status" => "Penyisihan"
        ],
        [
            "id" => 258,
            "team_id" => 701,
            "name" => "Winaar",
            "username" => "salsabilzhafirah701",
            "password" => "RT*ph57V",
            "status" => "Penyisihan"
        ],
        [
            "id" => 259,
            "team_id" => 656,
            "name" => "Maya Hilda",
            "username" => "ainunmaya656",
            "password" => "c*r#pM3B",
            "status" => "Penyisihan"
        ],
        [
            "id" => 260,
            "team_id" => 702,
            "name" => "Zamrud",
            "username" => "elokzakiya702",
            "password" => "xk6rZC-J",
            "status" => "Penyisihan"
        ],
        [
            "id" => 261,
            "team_id" => 703,
            "name" => "Loguer",
            "username" => "imampurnomo703",
            "password" => "V4Drn-qe",
            "status" => "Penyisihan"
        ],
        [
            "id" => 262,
            "team_id" => 649,
            "name" => "Bedjo",
            "username" => "windiadelia649",
            "password" => "zVk4-DbH",
            "status" => "Penyisihan"
        ],
        [
            "id" => 263,
            "team_id" => 704,
            "name" => "Naomi & Hazida",
            "username" => "naomizafira704",
            "password" => "u#CZ3tRN",
            "status" => "Penyisihan"
        ],
        [
            "id" => 264,
            "team_id" => 709,
            "name" => "Black Crows",
            "username" => "justinmanuel709",
            "password" => "z#*Nc4P6",
            "status" => "Penyisihan"
        ],
        [
            "id" => 265,
            "team_id" => 696,
            "name" => "ffffff",
            "username" => "wijaksaraaptaluhung696",
            "password" => "cXjQC-8k",
            "status" => "Penyisihan"
        ],
        [
            "id" => 266,
            "team_id" => 708,
            "name" => "nusayba asek",
            "username" => "rezaalifiah708",
            "password" => "ALy-p4Xk",
            "status" => "Penyisihan"
        ],
        [
            "id" => 267,
            "team_id" => 712,
            "name" => "Nusayba A",
            "username" => "putriamalia712",
            "password" => "h8-NpjfF",
            "status" => "Penyisihan"
        ],
        [
            "id" => 268,
            "team_id" => 340,
            "name" => "Marid",
            "username" => "muhammadassegaf340",
            "password" => "D#4-PfSk",
            "status" => "Penyisihan"
        ],
        [
            "id" => 269,
            "team_id" => 631,
            "name" => "Tim DANLIX",
            "username" => "danielchristopher631",
            "password" => "m3*wXuM#",
            "status" => "Penyisihan"
        ],
        [
            "id" => 270,
            "team_id" => 745,
            "name" => "Peeh",
            "username" => "mtadzkira745",
            "password" => "a*V27PDQ",
            "status" => "Penyisihan"
        ],
        [
            "id" => 271,
            "team_id" => 715,
            "name" => "AVERRO",
            "username" => "akmaaufa715",
            "password" => "j6#MWw9-",
            "status" => "Penyisihan"
        ],
        [
            "id" => 272,
            "team_id" => 686,
            "name" => "FANTASTIC TWO",
            "username" => "ilhamkhefi686",
            "password" => "Xe#n3dmk",
            "status" => "Penyisihan"
        ],
        [
            "id" => 273,
            "team_id" => 751,
            "name" => "Merak Dempo",
            "username" => "gabriellanadya751",
            "password" => "p3#tNV*r",
            "status" => "Penyisihan"
        ],
        [
            "id" => 274,
            "team_id" => 753,
            "name" => "Team Olympus",
            "username" => "eleazartadeo753",
            "password" => "zrw#Wf3T",
            "status" => "Penyisihan"
        ],
        [
            "id" => 275,
            "team_id" => 705,
            "name" => "MEMBADUT",
            "username" => "rainaaidahayu705",
            "password" => "Z9y#Ac3G",
            "status" => "Penyisihan"
        ],
        [
            "id" => 276,
            "team_id" => 749,
            "name" => "AVICENNA",
            "username" => "nevaldogusti749",
            "password" => "hw*Pzn62",
            "status" => "Penyisihan"
        ],
        [
            "id" => 277,
            "team_id" => 750,
            "name" => "ALFATIH",
            "username" => "muhraihan750",
            "password" => "jv*3ZN6L",
            "status" => "Penyisihan"
        ],
        [
            "id" => 278,
            "team_id" => 707,
            "name" => "Growing",
            "username" => "ignatiusloyola707",
            "password" => "u*PB98xd",
            "status" => "Penyisihan"
        ],
        [
            "id" => 279,
            "team_id" => 650,
            "name" => "Blesstematics",
            "username" => "celinachintya650",
            "password" => "Wh2v#-A9",
            "status" => "Penyisihan"
        ],
        [
            "id" => 280,
            "team_id" => 767,
            "name" => "Kurama",
            "username" => "akmalmaulana767",
            "password" => "m#FWx-4g",
            "status" => "Penyisihan"
        ],
        [
            "id" => 281,
            "team_id" => 770,
            "name" => "Team seven",
            "username" => "christopherlexand770",
            "password" => "n62R-wGp",
            "status" => "Penyisihan"
        ],
        [
            "id" => 282,
            "team_id" => 653,
            "name" => "Tim YOLO",
            "username" => "daffareladyatma653",
            "password" => "FqvQ4L*j",
            "status" => "Penyisihan"
        ],
        [
            "id" => 283,
            "team_id" => 765,
            "name" => "ALGEBRA",
            "username" => "danishnurikhsan765",
            "password" => "f-nFR3us",
            "status" => "Penyisihan"
        ],
        [
            "id" => 284,
            "team_id" => 766,
            "name" => "ALGORITMI",
            "username" => "hafiizhmaulana766",
            "password" => "B8Fr#G5b",
            "status" => "Penyisihan"
        ],
        [
            "id" => 285,
            "team_id" => 768,
            "name" => "IBNUKHALDUN",
            "username" => "raafisulthaan768",
            "password" => "Jyb-2Sjf",
            "status" => "Penyisihan"
        ],
        [
            "id" => 286,
            "team_id" => 759,
            "name" => "ALJAZIRI",
            "username" => "ghathfaanishaam759",
            "password" => "h65*NPyr",
            "status" => "Penyisihan"
        ],
        [
            "id" => 287,
            "team_id" => 760,
            "name" => "ALHAYTHAM",
            "username" => "hanifdwiky760",
            "password" => "nQd#5Zh7",
            "status" => "Penyisihan"
        ],
        [
            "id" => 288,
            "team_id" => 761,
            "name" => "ALMAKMUN",
            "username" => "hafizhirsyad761",
            "password" => "T-tS7q*X",
            "status" => "Penyisihan"
        ],
        [
            "id" => 289,
            "team_id" => 762,
            "name" => "ARRASYID",
            "username" => "anandarayhan762",
            "password" => "Dx7en-fR",
            "status" => "Penyisihan"
        ],
        [
            "id" => 290,
            "team_id" => 775,
            "name" => "GusTur",
            "username" => "muhammadfahmi775",
            "password" => "C#3hBrSf",
            "status" => "Penyisihan"
        ],
        [
            "id" => 291,
            "team_id" => 763,
            "name" => "ALBIRUNI",
            "username" => "muhammadardiansyah763",
            "password" => "S2ZmDv-9",
            "status" => "Penyisihan"
        ],
        [
            "id" => 292,
            "team_id" => 764,
            "name" => "IBNUBATUTAH",
            "username" => "davincendra764",
            "password" => "E#YP2yRJ",
            "status" => "Penyisihan"
        ],
        [
            "id" => 293,
            "team_id" => 693,
            "name" => "Ardadedali",
            "username" => "tioahmad693",
            "password" => "AsgB5N*v",
            "status" => "Penyisihan"
        ],
        [
            "id" => 294,
            "team_id" => 771,
            "name" => "Tokimo Executor",
            "username" => "kaylanamira771",
            "password" => "U#7sjvHp",
            "status" => "Penyisihan"
        ],
        [
            "id" => 295,
            "team_id" => 713,
            "name" => "SMASIFXII",
            "username" => "arvafauzta713",
            "password" => "q4NbHJ-6",
            "status" => "Penyisihan"
        ],
        [
            "id" => 296,
            "team_id" => 774,
            "name" => "Golden Hill",
            "username" => "christopherbrian774",
            "password" => "BSX2-yEj",
            "status" => "Penyisihan"
        ],
        [
            "id" => 297,
            "team_id" => 773,
            "name" => "EXIST 54",
            "username" => "arifianti773",
            "password" => "pS4e6*H3",
            "status" => "Penyisihan"
        ],
        [
            "id" => 298,
            "team_id" => 718,
            "name" => "TIM MBI HAROON",
            "username" => "muhammadfadhil718",
            "password" => "LhsJx3-b",
            "status" => "Penyisihan"
        ],
        [
            "id" => 299,
            "team_id" => 710,
            "name" => "SMANSASI",
            "username" => "renatatheresia710",
            "password" => "u-5UhcH3",
            "status" => "Penyisihan"
        ],
        [
            "id" => 300,
            "team_id" => 778,
            "name" => "Magma",
            "username" => "muhammadhikmal778",
            "password" => "qKZ8d#jw",
            "status" => "Penyisihan"
        ],
        [
            "id" => 301,
            "team_id" => 784,
            "name" => "MSG",
            "username" => "michaelalexander784",
            "password" => "SExza7-V",
            "status" => "Penyisihan"
        ],
        [
            "id" => 302,
            "team_id" => 785,
            "name" => "TIM MBI BACHRUM",
            "username" => "muhammadbachrum785",
            "password" => "cWu#7*BN",
            "status" => "Penyisihan"
        ],
        [
            "id" => 303,
            "team_id" => 756,
            "name" => "ELYSIAN",
            "username" => "khalishazhurifah756",
            "password" => "ZSm8#xwW",
            "status" => "Penyisihan"
        ],
        [
            "id" => 304,
            "team_id" => 783,
            "name" => "Tim Asik",
            "username" => "dielianmaulana783",
            "password" => "aEz2U*75",
            "status" => "Penyisihan"
        ],
        [
            "id" => 305,
            "team_id" => 776,
            "name" => "flawsome",
            "username" => "putriamelia776",
            "password" => "Z36E*NpX",
            "status" => "Penyisihan"
        ],
        [
            "id" => 306,
            "team_id" => 711,
            "name" => "capung",
            "username" => "stevengilberto711",
            "password" => "JPdtb7-U",
            "status" => "Penyisihan"
        ],
        [
            "id" => 307,
            "team_id" => 777,
            "name" => "Besh Cabang Logika",
            "username" => "muhammadnaufal777",
            "password" => "FQ-2ZKbg",
            "status" => "Penyisihan"
        ],
        [
            "id" => 308,
            "team_id" => 789,
            "name" => "BTC",
            "username" => "fajarsapto789",
            "password" => "S6gNGz#Q",
            "status" => "Penyisihan"
        ],
        [
            "id" => 309,
            "team_id" => 791,
            "name" => "TIM QUIDDITCH",
            "username" => "laurennatasha791",
            "password" => "h*-Xj5qp",
            "status" => "Penyisihan"
        ],
        [
            "id" => 310,
            "team_id" => 790,
            "name" => "J4F",
            "username" => "angeliaeugenie790",
            "password" => "DWh5-svy",
            "status" => "Penyisihan"
        ],
        [
            "id" => 311,
            "team_id" => 752,
            "name" => "SANSYU",
            "username" => "aisyahayu752",
            "password" => "ALV4*pCj",
            "status" => "Penyisihan"
        ],
        [
            "id" => 312,
            "team_id" => 793,
            "name" => "High Elo",
            "username" => "audreysantoso793",
            "password" => "Ns9-QX74",
            "status" => "Penyisihan"
        ],
        [
            "id" => 313,
            "team_id" => 792,
            "name" => "Dharil",
            "username" => "muhammaddharil792",
            "password" => "Uzq#3GP*",
            "status" => "Penyisihan"
        ],
        [
            "id" => 314,
            "team_id" => 786,
            "name" => "Veir",
            "username" => "abdullahfaqih786",
            "password" => "M8aQ#yn5",
            "status" => "Penyisihan"
        ],
        [
            "id" => 315,
            "team_id" => 706,
            "name" => "Masih Dipikir",
            "username" => "muhammadjundan706",
            "password" => "e-GPj2Uy",
            "status" => "Penyisihan"
        ],
        [
            "id" => 316,
            "team_id" => 797,
            "name" => "TIM PUTRA SMAIT IBNU ABBAS KLATEN",
            "username" => "anasmuhammad797",
            "password" => "rA*6S#3D",
            "status" => "Penyisihan"
        ],
        [
            "id" => 317,
            "team_id" => 798,
            "name" => "centaurus",
            "username" => "mujahidahrahmathul798",
            "password" => "F8#LbwKe",
            "status" => "Penyisihan"
        ],
        [
            "id" => 318,
            "team_id" => 717,
            "name" => "SMASIFPR",
            "username" => "sabrinamuthia717",
            "password" => "kp#5UG9x",
            "status" => "Penyisihan"
        ],
        [
            "id" => 319,
            "team_id" => 782,
            "name" => "Resonance",
            "username" => "shafaalysia782",
            "password" => "d-Zqb#5B",
            "status" => "Penyisihan"
        ],
        [
            "id" => 320,
            "team_id" => 757,
            "name" => "Bukan Panitia",
            "username" => "nyomanganadipa757",
            "password" => "kaUX*6Ze",
            "status" => "Penyisihan"
        ],
        [
            "id" => 321,
            "team_id" => 714,
            "name" => "SMASIFXI",
            "username" => "ahmadfaiz714",
            "password" => "v#d3DNK6",
            "status" => "Penyisihan"
        ],
        [
            "id" => 322,
            "team_id" => 716,
            "name" => "SMASIFX",
            "username" => "razanwidya716",
            "password" => "ndAR2e-m",
            "status" => "Penyisihan"
        ],
        [
            "id" => 323,
            "team_id" => 788,
            "name" => "LENKO JAYA",
            "username" => "johanadrian788",
            "password" => "g3m#yJUd",
            "status" => "Penyisihan"
        ],
        [
            "id" => 324,
            "team_id" => 796,
            "name" => "Hypatia",
            "username" => "bulaniftinazhifa796",
            "password" => "rJ*VX-8#",
            "status" => "Penyisihan"
        ],
        [
            "id" => 325,
            "team_id" => 801,
            "name" => "AsTra KOSAYOE",
            "username" => "jasonazaya801",
            "password" => "xd3eXG*q",
            "status" => "Penyisihan"
        ],
        [
            "id" => 326,
            "team_id" => 787,
            "name" => "Toxic GE",
            "username" => "edraelricadewi787",
            "password" => "Wcj*-7Y#",
            "status" => "Penyisihan"
        ],
        [
            "id" => 327,
            "team_id" => 803,
            "name" => "Kosayu 6",
            "username" => "angelooswald803",
            "password" => "UkG3-6NV",
            "status" => "Penyisihan"
        ],
        [
            "id" => 328,
            "team_id" => 805,
            "name" => "Alabaster",
            "username" => "rivoparhorasan805",
            "password" => "PgU-vr8d",
            "status" => "Penyisihan"
        ],
        [
            "id" => 329,
            "team_id" => 754,
            "name" => "SUKSES MAN 2 BENGKULU",
            "username" => "muhamadauditri754",
            "password" => "dk5*Ne4x",
            "status" => "Penyisihan"
        ],
        [
            "id" => 330,
            "team_id" => 802,
            "name" => "Wokepedia",
            "username" => "muhammadnaswan802",
            "password" => "a2X4*QZr",
            "status" => "Penyisihan"
        ],
        [
            "id" => 331,
            "team_id" => 781,
            "name" => "Man 2 Bengkulu",
            "username" => "fadhlirn781",
            "password" => "Lhau*T2f",
            "status" => "Penyisihan"
        ],
        [
            "id" => 332,
            "team_id" => 806,
            "name" => "Nefri & Fredi",
            "username" => "nefrilabia806",
            "password" => "A5wL3*uT",
            "status" => "Penyisihan"
        ],
        [
            "id" => 333,
            "team_id" => 807,
            "name" => "HARKY",
            "username" => "rifkyrahmad807",
            "password" => "T59N-eY4",
            "status" => "Penyisihan"
        ],
        [
            "id" => 334,
            "team_id" => 809,
            "name" => "weSolve",
            "username" => "shalihcantara809",
            "password" => "SYDc#x6b",
            "status" => "Penyisihan"
        ],
        [
            "id" => 335,
            "team_id" => 794,
            "name" => "Marshal.H dan Nur Zakiah Mas'ud",
            "username" => "marshalh794",
            "password" => "UFJ7e2#*",
            "status" => "Penyisihan"
        ],
        [
            "id" => 336,
            "team_id" => 810,
            "name" => "Amazing",
            "username" => "miftahulfajri810",
            "password" => "Y9MkVj-Q",
            "status" => "Penyisihan"
        ],
        [
            "id" => 337,
            "team_id" => 804,
            "name" => "ucull",
            "username" => "ardhiahyayan804",
            "password" => "Yy#2vP*S",
            "status" => "Penyisihan"
        ],
        [
            "id" => 338,
            "team_id" => 769,
            "name" => "Arunika",
            "username" => "fitrinur769",
            "password" => "sR#24r7a",
            "status" => "Penyisihan"
        ],
        [
            "id" => 339,
            "team_id" => 654,
            "name" => "Tim OKE",
            "username" => "joeldixon654",
            "password" => "brLCc#9x",
            "status" => "Penyisihan"
        ],
        [
            "id" => 340,
            "team_id" => 812,
            "name" => "OxyBan",
            "username" => "aliefgilang812",
            "password" => "pTW7vc#-",
            "status" => "Penyisihan"
        ],
        [
            "id" => 341,
            "team_id" => 813,
            "name" => "DAR",
            "username" => "danaaffan813",
            "password" => "Cd3q*DPb",
            "status" => "Penyisihan"
        ],
        [
            "id" => 342,
            "team_id" => 814,
            "name" => "Pucuk 2",
            "username" => "gilbertchristado814",
            "password" => "jb2nQ#DJ",
            "status" => "Penyisihan"
        ],
        [
            "id" => 343,
            "team_id" => 815,
            "name" => "Pucuk 1",
            "username" => "danielpandapotan815",
            "password" => "DvcJ#x5K",
            "status" => "Penyisihan"
        ],
        [
            "id" => 344,
            "team_id" => 817,
            "name" => "BOOM",
            "username" => "inadamayanti817",
            "password" => "uW6Ag-T*",
            "status" => "Penyisihan"
        ],
        [
            "id" => 345,
            "team_id" => 811,
            "name" => "OKOJ",
            "username" => "egahqusay811",
            "password" => "uD-6Pbd5",
            "status" => "Penyisihan"
        ],
        [
            "id" => 346,
            "team_id" => 698,
            "name" => "TieDonJano",
            "username" => "raihankrisna698",
            "password" => "vtT*-#7p",
            "status" => "Penyisihan"
        ],
        [
            "id" => 347,
            "team_id" => 818,
            "name" => "Sentinel",
            "username" => "muhammadrafli818",
            "password" => "m-aFQ2Rb",
            "status" => "Penyisihan"
        ],
        [
            "id" => 348,
            "team_id" => 820,
            "name" => "ACE",
            "username" => "jameswilliam820",
            "password" => "Pu-95VbU",
            "status" => "Penyisihan"
        ],
        [
            "id" => 349,
            "team_id" => 816,
            "name" => "Team testing",
            "username" => "rizqitsani816",
            "password" => "randompass",
            "status" => TahapanEnum::PENYISIHAN
        ]
    ];

    public function run()
    {
        DB::table('tahapan_team')
            ->insert($this->data);
    }
}
