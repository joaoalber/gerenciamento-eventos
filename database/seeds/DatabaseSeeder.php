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
            DB::table('evento')->insert([
                'nome' => 'Evento2',	
                'data'	=> '2019-12-25',
                'descricao'	=> 'Evento de Teste 2',
                'local'	=> 'Logo Ali',
                'hora' => '13:30',
            ]);
        }catch(\Exception $e){}
        
        try{
            DB::table('participante')->insert([
                'nome' => 'Joséfo Joãoestrela',
                'rg' => '12345678-8',
                'cpf' => '12345678901',
                'email' => 'josephjoestar@email.com',
                'telefone'	=> '3833-3333',
                'data_nascimento' => '1970-01-01',
                'organizacao' => 'Speedwagon Foundation',
            ]);
        }catch(\Exception $e){}

        try{
            DB::table('participante')->insert([
                'nome' => 'Jonatão Joãoestrela',
                'rg' => '22334455-3',
                'cpf' => '98765432156',
                'email' => 'jojo@email.com',
                'telefone'	=> '3856-7767',
                'data_nascimento' => '1871-01-01',
                'organizacao' => 'Speedwagon Foundation',
            ]);
        }catch(\Exception $e){}

        try{
            DB::table('participante')->insert([
                'nome' => 'Jucelina Joãoestrela',
                'rg' => '12123434-1',
                'cpf' => '45236799213',
                'email' => 'jolyne@email.com',
                'telefone'	=> '3671-5922',
                'data_nascimento' => '1994-01-01',
                'organizacao' => 'Speedwagon Foundation',
            ]);
        }catch(\Exception $e){}

        try{
            DB::table('participantes_eventos')->insert([
                'participante_id' => 1,
                'evento_id' => 1,
            ]);
        }catch(\Exception $e){}
        
        try{
            DB::table('participantes_eventos')->insert([
                'participante_id' => 2,
                'evento_id' => 1,
            ]);
        }catch(\Exception $e){}
                
        try{
            DB::table('participantes_eventos')->insert([
                'participante_id' => 3,
                'evento_id' => 2,
            ]);
        }catch(\Exception $e){}
    }
}
