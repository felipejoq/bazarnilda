<?php

use App\Bodega;
use App\Categoria;
use App\Producto;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $usuario1 = new User([
            'name' => 'Administrador',
            'email' => 'admin@admin.com',
            'rol' => 'administrador',
            'password' => bcrypt('123123')
        ]);
        $usuario1->save();

        $usuario2 = new User([
            'name' => 'Bodeguero',
            'email' => 'bodega@admin.com',
            'rol' => 'bodeguero',
            'password' => bcrypt('123123')
        ]);
        $usuario2->save();

        $usuario3 = new User([
            'name' => 'Vendedor',
            'email' => 'vendedor@admin.com',
            'rol' => 'vendedor',
            'password' => bcrypt('123123')
        ]);
        $usuario3->save();

        $categoria1 = new Categoria([
            'nombre' => 'Pantalones mujer',
            'descripcion' => 'Los mejores pantalones de mujer'
        ]);
        $categoria1->save();

        $categoria2 = new Categoria([
            'nombre' => 'Pantalones Hombre',
            'descripcion' => 'Los mejores pantalones de hombre'
        ]);
        $categoria2->save();

        $bodega1 = new Bodega([
            'nombre' => 'Bodega zapatos',
            'descripcion' => 'Bodega que almacena sólo zapatos',
            'numero' => '001'
        ]);
        $bodega1->save();

        $id = "P0000000";

        $producto1 = new Producto([
            'nombre' => 'Zapatilla PAND-G',
            'descripcion' => 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos',
            'talla' => 'Nº 40',
            'cantidad' => 20,
            'minimo' => 5,
            //'barcode' => uniqid(),
            'barcode' => hexdec(uniqid()),
            'categoria_id' => 1,
            'bodega_id' => 1
        ]);
        $producto1->save();

        $producto2 = new Producto([
            'nombre' => 'Pantalón Parada 111',
            'descripcion' => 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos',
            'talla' => 'Talla 42',
            'cantidad' => 26,
            'minimo' => 5,
            //'barcode' => uniqid(),
            'barcode' => hexdec(uniqid()),
            'categoria_id' => 1,
            'bodega_id' => 1
        ]);
        $producto2->save();

    }
}
