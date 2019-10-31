<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\{Evento,Participante};

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        try{
            DB::table('evento')->insert([
                'nome' => 'Evento1',	
                'data'	=> '2019-12-30',
                'descricao'	=> 'Evento de Teste',
                'local'	=> 'Algum lugar',
                'hora' => '12:00',
            ]);
        }catch(\Exception $e){}
        
        try{
            DB::table('participante')->insert([
                'nome' => 'José Joaoestrela',
                'rg' => '12345678-8',
                'cpf' => '1234567890',
                'email' => 'jojo@email.com',
                'telefone'	=> '3833-3333',
                'data_nascimento' => '1871-01-01',
                'organizacao' => 'Organização teste',
            ]);
        }catch(\Exception $e){}

        try{
            DB::table('participantes_eventos')->insert([
                'participante_id' => 1,
                'evento_id' => 1,
            ]);
        }catch(\Exception $e){}
    }
}
