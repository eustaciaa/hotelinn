<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = new App\User;
        $user->email = "test@test.com";
        $user->fName = "tester";
        $user->lName = "account";
        $user->password = Hash::make("test");
        $user->birthdate = "2012-12-12";
        $user->gender = 'M';
        $user->save();

        $user = new App\Admin;
        $user->fName = "admin";
        $user->username = "admin";
        $user->email = "admin@test.com";
        $user->password = Hash::make("admin");
        $user->save();

        $provinsi = new App\provinsi;
        $provinsi->namaProvinsi = "DKI Jakarta";
        $provinsi->save();

        $kota = new App\kota;
        $kota->namaKota = "Jakarta";
        $provinsi->kota()->save($kota);

        $provinsi = new App\provinsi;
        $provinsi->namaProvinsi = "D.I Yogyakarta";
        $provinsi->save();

        $kota = new App\kota;
        $kota->namaKota = "Yogyakarta";
        $provinsi->kota()->save($kota);

        $provinsi = new App\Provinsi;
        $provinsi->namaProvinsi = "Banten";
        $provinsi->save();

        $kota = new App\kota;
        $kota->namaKota = "Tangerang";
        $provinsi->kota()->save($kota);

        $kota = new App\kota;
        $kota->namaKota = "Tangerang Selatan";
        $provinsi->kota()->save($kota);

        $kota = new app\kota;
        $kota->namaKota = "Serang";
        $provinsi->kota()->save($kota);

        $hotel = new App\hotel;
        $hotel->name = "Fraser Residence Menteng";
        $hotel->star = 5;
        $hotel->rating = 8.5;
        $hotel->reviewers = 10;
        $hotel->photo = "/images/hotel/fraser-residence-menteng/home.jpg";
        $hotel->save();

        $alamat = new App\alamat;
        $alamat->provinsi_id = 1;
        $alamat->kota_id = 1;
        $alamat->detailLengkap = "Jl. Menteng Raya No. 60, Menteng Jakarta 10340,Indonesia";

        $hotel->alamat()->save($alamat);

        $room = new App\room_details;
        $room->name = "Studio Executive";
        $room->cost = 1200000;
        $room->capacity = "1 kasur king size";
        $room->freeWifi = true;
        $room->noSmoking = true;
        $room->shower = "Bak mandi dan pancuran terpisah, perlengkapan mandi, cermin, pengering rambut, produk pembersih";
        $room->scenery = "Pemandangan: Kota";
        $room->entertainment = "TV satelit/kabel, telepon, film sesuai permintaan, iPod docking station";
        $room->convenience = "AC, kedap suara, koran harian, linen, sandal dalam kamar";
        $room->furniture = "Area tempat duduk, lantai kayu/parket, meja, perapian, ruang makan terpisah";
        $room->service = "Layanan kebersihan harian, layanan dibangunkan tidur";
        $room->food = "Kulkas, dapur lengkap, mesin pembuat kopi/teh, microwave, air mineral kemasan";
        $room->available = 3;
        $room->photo = "/images/hotel/fraser-residence-menteng/studio-executive.jpg";
        $hotel->room()->save($room);

        $room = new App\room_details;
        $room->name = "Studio Premiere";
        $room->cost = 1500000;
        $room->capacity = "1 kasur king size";
        $room->freeWifi = true;
        $room->noSmoking = true;
        $room->shower = "Bak mandi dan pancuran terpisah, perlengkapan mandi, cermin, pengering rambut, produk pembersih";
        $room->scenery = "Pemandangan: Kota";
        $room->entertainment = "TV satelit/kabel, telepon, film sesuai permintaan, iPod docking station";
        $room->convenience = "AC, kedap suara, koran harian, linen, sandal dalam kamar";
        $room->furniture = "Area tempat duduk, lantai kayu/parket, meja, perapian, ruang makan terpisah";
        $room->service = "Layanan kebersihan harian, layanan dibangunkan tidur";
        $room->food = "Kulkas, dapur lengkap, mesin pembuat kopi/teh, microwave, air mineral kemasan";
        $room->available = 3;
        $room->photo = "/images/hotel/fraser-residence-menteng/studio-premiere.jpeg";
        $hotel->room()->save($room);

        $room = new App\room_details;
        $room->name = "Apartment Executive";
        $room->cost = 2500000;
        $room->capacity = "1 kasur king size";
        $room->freeWifi = true;
        $room->noSmoking = true;
        $room->shower = "Pancuran dan bak mandi, perlengkapan mandi, cermin, pengering rambut, produk pembersih";
        $room->scenery = "Pemandangan: Kota";
        $room->entertainment = "TV satelit/kabel, telepon, film sesuai permintaan, iPod docking station";
        $room->convenience = "AC, kedap suara, koran harian, linen, sandal dalam kamar";
        $room->furniture = "Area tempat duduk, lantai kayu/parket, meja, perapian, ruang makan terpisah";
        $room->service = "Layanan kebersihan harian, layanan dibangunkan tidur";
        $room->food = "Kulkas, dapur lengkap, mesin pembuat kopi/teh, microwave, air mineral kemasan";
        $room->laundry = "Fasilitas setrika, lemari pakaian, pengering pakaian, kamar ganti, mesin cuci, rak pakaian";
        $room->security_safety = "Brankas, tempat menyimpan laptop, pendeteksi asap";
        $room->available = 2;
        $room->photo = "/images/hotel/fraser-residence-menteng/apartment-executive.jpg";
        $hotel->room()->save($room);


        $hotel = new App\hotel;
        $hotel->name = "Business Tomang";
        $hotel->star = 3;
        $hotel->photo = '/images/hotel/business-tomang/home.jpg';
        $hotel->save();


        $alamat = new App\alamat;
        $alamat->provinsi_id = 1;
        $alamat->kota_id = 1;
        $alamat->detailLengkap = "Jl. Raya Tomang No.51, 11440, Jakarta, Indonesia";

        $hotel->alamat()->save($alamat);

        $room = new App\room_details;
        $room->name = "Standard Double Room";
        $room->cost = 225000;
        $room->capacity = "1 kasur double";
        $room->freeWifi = true;
        $room->noSmoking = true;
        $room->scenery = "Pemandangan: Kota";
        $room->shower = "Pancuran";
        $room->entertainment = "TV satelit/kabel, telepon";
        $room->convenience = "AC";
        $room->service = "Layanan kebersihan harian";
        $room->furniture = "Meja";
        $room->security_safety = "Brankas";
        $room->available = 5;
        $room->photo = '/images/hotel/business-tomang/standard-double-room.jpeg';
        $hotel->room()->save($room);

        $room = new App\room_details;
        $room->name = "Deluxe Twin Room";
        $room->cost = 175000;
        $room->capacity = "2 kasur single";
        $room->freeWifi = true;
        $room->noSmoking = true;
        $room->scenery = "Pemandangan: Kota";
        $room->shower = "Pancuran";
        $room->entertainment = "TV satelit/kabel, telepon";
        $room->convenience = "AC";
        $room->furniture = "Meja";
        $room->laundry = "Lemari pakaian, rak pakaian";
        $room->security_safety = "Pemadam api, brankas";
        $room->available = 0;
        $room->photo = '/images/hotel/business-tomang/deluxe-twin-room.jpg';
        $hotel->room()->save($room);

        $hotel = new App\hotel;
        $hotel->name = "Jambuluwuk Malioboro";
        $hotel->star = 5;
        $hotel->rating = 8.7;
        $hotel->reviewers = 15;
        $hotel->photo = "/images/hotel/jambuluwuk-malioboro/home.jpg";
        $hotel->save();

        $alamat = new App\Alamat;
        $alamat->provinsi_id = 2;
        $alamat->kota_id = 2;
        $alamat->detailLengkap = "Jl. Gajah Mada No. 67, 55112, Yogyakarta, Indonesia";
        $hotel->alamat()->save($alamat);


    }
}
