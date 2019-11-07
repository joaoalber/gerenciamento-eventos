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
        //Eventos para teste
        try{
            DB::table('evento')->insert([
                //Eventos normais
                [
                    'nome' => 'Evento 1',	
                    'data'	=> '2022-12-30',
                    'descricao'	=> 'Evento de Teste 1',
                    'local'	=> 'Algum lugar',
                    'hora' => '12:00',
                    'cancelado' => 0,
                    'deleted_at' => null
                ],
                [
                    'nome' => 'Evento 2',	
                    'data'	=> '2022-12-25',
                    'descricao'	=> 'Evento de Teste 2',
                    'local'	=> 'Logo Ali',
                    'hora' => '13:30',
                    'cancelado' => 0,
                    'deleted_at' => null
                ],
                [
                    'nome' => 'Evento 3',	
                    'data'	=> '2022-12-30',
                    'descricao'	=> 'Evento de Teste 3',
                    'local'	=> 'Algum lugar',
                    'hora' => '12:00',
                    'cancelado' => 0,
                    'deleted_at' => null
                ],
                [
                    'nome' => 'Evento 4',	
                    'data'	=> '2022-12-30',
                    'descricao'	=> 'Evento de Teste 4',
                    'local'	=> 'Algum lugar',
                    'hora' => '12:00',
                    'cancelado' => 0,
                    'deleted_at' => null
                ],
                [
                    'nome' => 'Evento 5',	
                    'data'	=> '2022-12-30',
                    'descricao'	=> 'Evento de Teste 5',
                    'local'	=> 'Algum lugar',
                    'hora' => '12:00',
                    'cancelado' => 0,
                    'deleted_at' => null
                ],
                //Eventos Cancelados
                [
                    'nome' => 'Cancelado 1',	
                    'data'	=> '2019-12-30',
                    'descricao'	=> 'Cancelado de Teste 1',
                    'local'	=> 'Algum lugar',
                    'hora' => '12:00',
                    'cancelado' => 1,
                    'deleted_at' => null
                ],
                [
                    'nome' => 'Cancelado 2',	
                    'data'	=> '2019-12-30',
                    'descricao'	=> 'Cancelado de Teste 2',
                    'local'	=> 'Algum lugar',
                    'hora' => '12:00',
                    'cancelado' => 1,
                    'deleted_at' => null
                ],
                [
                    'nome' => 'Cancelado 3',	
                    'data'	=> '2019-12-30',
                    'descricao'	=> 'Cancelado de Teste 3',
                    'local'	=> 'Algum lugar',
                    'hora' => '12:00',
                    'cancelado' => 1,
                    'deleted_at' => null
                ],
                [
                    'nome' => 'Cancelado 4',	
                    'data'	=> '2019-12-30',
                    'descricao'	=> 'Cancelado de Teste 4',
                    'local'	=> 'Algum lugar',
                    'hora' => '12:00',
                    'cancelado' => 1,
                    'deleted_at' => null
                ],
                [
                    'nome' => 'Cancelado 5',	
                    'data'	=> '2019-12-30',
                    'descricao'	=> 'Cancelado de Teste 5',
                    'local'	=> 'Algum lugar',
                    'hora' => '12:00',
                    'cancelado' => 1,
                    'deleted_at' => null
                ],
                //Eventos Expirados
                [
                    'nome' => 'Expirado 1',	
                    'data'	=> '2018-12-30',
                    'descricao'	=> 'Expirado de Teste 1',
                    'local'	=> 'Algum lugar',
                    'hora' => '12:00',
                    'cancelado' => 0,
                    'deleted_at' => null
                ],
                [
                    'nome' => 'Expirado 2',	
                    'data'	=> '2018-12-30',
                    'descricao'	=> 'Expirado de Teste 2',
                    'local'	=> 'Algum lugar',
                    'hora' => '12:00',
                    'cancelado' => 0,
                    'deleted_at' => null
                ],
                [
                    'nome' => 'Expirado 3',	
                    'data'	=> '2018-12-30',
                    'descricao'	=> 'Expirado de Teste 3',
                    'local'	=> 'Algum lugar',
                    'hora' => '12:00',
                    'cancelado' => 0,
                    'deleted_at' => null
                ],
                [
                    'nome' => 'Expirado 4',	
                    'data'	=> '2018-12-30',
                    'descricao'	=> 'Expirado de Teste 4',
                    'local'	=> 'Algum lugar',
                    'hora' => '12:00',
                    'cancelado' => 0,
                    'deleted_at' => null
                ],
                [
                    'nome' => 'Expirado 5',	
                    'data'	=> '2018-12-30',
                    'descricao'	=> 'Expirado de Teste 5',
                    'local'	=> 'Algum lugar',
                    'hora' => '12:00',
                    'cancelado' => 0,
                    'deleted_at' => null
                ],
                //Eventos Excluídos
                [
                    'nome' => 'Excluído 1',	
                    'data'	=> '2019-12-30',
                    'descricao'	=> 'Excluído de Teste 1',
                    'local'	=> 'Algum lugar',
                    'hora' => '12:00',
                    'cancelado' => 0,
                    'deleted_at' => date('Y-m-d')
                ],
                [
                    'nome' => 'Excluído 2',	
                    'data'	=> '2019-12-30',
                    'descricao'	=> 'Excluído de Teste 2',
                    'local'	=> 'Algum lugar',
                    'hora' => '12:00',
                    'cancelado' => 0,
                    'deleted_at' => date('Y-m-d')
                ],
                [
                    'nome' => 'Excluído 3',	
                    'data'	=> '2019-12-30',
                    'descricao'	=> 'Excluído de Teste 3',
                    'local'	=> 'Algum lugar',
                    'hora' => '12:00',
                    'cancelado' => 0,
                    'deleted_at' => date('Y-m-d')
                ],
                [
                    'nome' => 'Excluído 4',	
                    'data'	=> '2019-12-30',
                    'descricao'	=> 'Excluído de Teste 4',
                    'local'	=> 'Algum lugar',
                    'hora' => '12:00',
                    'cancelado' => 0,
                    'deleted_at' => date('Y-m-d')
                ],
                [
                    'nome' => 'Excluído 5',	
                    'data'	=> '2019-12-30',
                    'descricao'	=> 'Excluído de Teste 5',
                    'local'	=> 'Algum lugar',
                    'hora' => '12:00',
                    'cancelado' => 0,
                    'deleted_at' => date('Y-m-d')
                ]
            ]);
        }catch(\Exception $e){}
        
        //Participantes de Teste
        try{
            DB::table('participante')->insert([
                //Usuarios Comuns
                [
                    'nome' => 'Joséfo Joãoestrela',
                    'rg' => '18.092.054-6',
                    'cpf' => '940.404.288-97',
                    'email' => 'josephjoestar@email.com',
                    'telefone'	=> '3833-3333',
                    'data_nascimento' => '1970-01-01',
                    'deleted_at' => null,
                    'organizacao' => 'Speedwagon Foundation',
                ],
                [
                    'nome' => 'Jonatão Joãoestrela',
                    'rg' => '16.818.192-7',
                    'cpf' => '286.822.058-40',
                    'email' => 'jojo@email.com',
                    'telefone'	=> '3856-7767',
                    'data_nascimento' => '1871-01-01',
                    'deleted_at' => null,
                    'organizacao' => 'Speedwagon Foundation',
                ],
                [
                    'nome' => 'Jucelina Joãoestrela',
                    'rg' => '20.956.768-5',
                    'cpf' => '774.197.238-34',
                    'email' => 'jolyne@email.com',
                    'telefone'	=> '3671-5922',
                    'data_nascimento' => '1994-01-01',
                    'deleted_at' => null,
                    'organizacao' => 'Speedwagon Foundation',
                ],
                [
                    'nome' => 'Jotaro Joãoestrela',
                    'rg' => '14.456.660-6',
                    'cpf' => '005.992.648-10',
                    'email' => 'dolphinenthusiast@email.com',
                    'telefone'	=> '3671-5922',
                    'data_nascimento' => '1994-01-01',
                    'deleted_at' => null,
                    'organizacao' => 'Speedwagon Foundation',
                ],
                [
                    'nome' => 'Josuque Joãoestrela',
                    'rg' => '41.447.677-3',
                    'cpf' => '971.048.818-08',
                    'email' => 'HigashikataJoJo@email.com',
                    'telefone'	=> '3671-5922',
                    'data_nascimento' => '1994-01-01',
                    'deleted_at' => null,
                    'organizacao' => 'Speedwagon Foundation',
                ],
                [
                    'nome' => 'Giorno Giovanna',
                    'rg' => '34.382.492-9',
                    'cpf' => '569.687.368-53',
                    'email' => 'igiornogiovannahaveadream@email.com',
                    'telefone'	=> '3671-5922',
                    'data_nascimento' => '1994-01-01',
                    'deleted_at' => null,
                    'organizacao' => 'Italian Mafia',
                ],
                //Usuarios Excluídos
                [
                    'nome' => 'Cu Culainn',
                    'rg' => '26.586.563-3',
                    'cpf' => '399.739.538-19',
                    'email' => 'lancergashinda@email.com',
                    'telefone'	=> '3671-5922',
                    'data_nascimento' => '1994-01-01',
                    'deleted_at' => date('Y-m-d'),
                    'organizacao' => 'Backspear  Boys',
                ],
                [
                    'nome' => 'Rory Williams',
                    'rg' => '24.003.932-4',
                    'cpf' => '336.997.588-26',
                    'email' => 'deadcenturion@email.com',
                    'telefone'	=> '3671-5922',
                    'data_nascimento' => '1994-01-01',
                    'deleted_at' => date('Y-m-d'),
                    'organizacao' => 'T.A.R.D.I.S. Honorary Member',
                ],
                [
                    'nome' => 'Kenny',
                    'rg' => '28.915.713-4',
                    'cpf' => '838.135.098-00',
                    'email' => 'mysterion@email.com',
                    'telefone'	=> '3671-5922',
                    'data_nascimento' => '1994-01-01',
                    'deleted_at' => date('Y-m-d'),
                    'organizacao' => 'Coon & Friends',
                ],
                [
                    'nome' => 'Krilin',
                    'rg' => '48.321.322-6',
                    'cpf' => '252.489.728-17',
                    'email' => 'deadagain@email.com',
                    'telefone'	=> '3671-5922',
                    'data_nascimento' => '1994-01-01',
                    'deleted_at' => date('Y-m-d'),
                    'organizacao' => 'N/A',
                ],
                [
                    'nome' => 'Natsuki Subaru',
                    'rg' => '50.331.768-8',
                    'cpf' => '209.004.918-92',
                    'email' => 'iloveemilya@email.com',
                    'telefone'	=> '3671-5922',
                    'data_nascimento' => '1994-01-01',
                    'deleted_at' => date('Y-m-d'),
                    'organizacao' => 'The Emilya Faction',
                ],
                [
                    'nome' => 'Literally Anyone from Homestuck',
                    'rg' => '43.398.513-6',
                    'cpf' => '223.807.588-75',
                    'email' => 'Hussie@email.com',
                    'telefone'	=> '3671-5922',
                    'data_nascimento' => '1994-01-01',
                    'deleted_at' => date('Y-m-d'),
                    'organizacao' => 'MS Paint Adventures',
                ]
            ]);
        }catch(\Exception $e){}

        //Liga os participantes aos eventos para teste
        try{
            DB::table('participantes_eventos')->insert([
                [
                    'participante_id' => 1,
                    'evento_id' => 1,
                ],
                [
                    'participante_id' => 1,
                    'evento_id' => 2,
                ],
                [
                    'participante_id' => 1,
                    'evento_id' => 3,
                ],
                [
                    'participante_id' => 1,
                    'evento_id' => 4,
                ],
                [
                    'participante_id' => 1,
                    'evento_id' => 5,
                ],
                [
                    'participante_id' => 1,
                    'evento_id' => 6,
                ],
                [
                    'participante_id' => 1,
                    'evento_id' => 7,
                ],
                [
                    'participante_id' => 2,
                    'evento_id' => 1,
                ],
                [
                    'participante_id' => 2,
                    'evento_id' => 2,
                ],
                [
                    'participante_id' => 3,
                    'evento_id' => 3,
                ],
                [
                    'participante_id' => 4,
                    'evento_id' => 8,
                ],
                [
                    'participante_id' => 5,
                    'evento_id' => 9,
                ],
                [
                    'participante_id' => 5,
                    'evento_id' => 11,
                ],
                [
                    'participante_id' => 5,
                    'evento_id' => 1,
                ],
                [
                    'participante_id' => 5,
                    'evento_id' => 16,
                ],
                [
                    'participante_id' => 7,
                    'evento_id' => 17,
                ]
            ]);
        }catch(\Exception $e){}
        
    }
}
