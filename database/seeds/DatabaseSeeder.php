<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {   
       DB::table('user')->insert([ 
          'nome' => 'Fred Azevedo',
          'email' => 'fred@macroerp.com.br',
          'senha' => '$2y$10$GqyKuXzkmc6JwxbjIl.Omu9cyadKGco0ayvwIRWMicA/fg/ftMvSi',
          'cpf' => '05131888433'
        ]);

       DB::table('cidades')->insert([ 
        	'nome' => 'Natal'
        ]);
       DB::table('cidades')->insert([ 
        	'nome' => 'Macaíba'
        ]);
       DB::table('cidades')->insert([ 
        	'nome' => 'Nova Parnamirim'
        ]);
       DB::table('cidades')->insert([ 
        	'nome' => 'Parnamirim'
        ]);

       DB::table('bairros')->insert([ 
            'cidades_id' => '1',
            'nome' => 'Alecrim'
        ]);

       DB::table('bairros')->insert([ 
            'cidades_id' => '1',
            'nome' => 'Cidade Alta'
        ]);

       DB::table('bairros')->insert([ 
            'cidades_id' => '1',
            'nome' => 'Barro Vermelho'
        ]);

       DB::table('cores')->insert([ 
            'nome' => 'Azul'
        ]);

       DB::table('cores')->insert([ 
            'nome' => 'Amarelo'
        ]);

       DB::table('cores')->insert([ 
            'nome' => 'Branco'
        ]);

       DB::table('cores')->insert([ 
            'nome' => 'Cinza'
        ]);

       DB::table('cores')->insert([ 
            'nome' => 'Laranja'
        ]);

       DB::table('cores')->insert([ 
            'nome' => 'Marrom'
        ]);

       DB::table('cores')->insert([ 
            'nome' => 'Prata'
        ]);

       DB::table('cores')->insert([ 
            'nome' => 'Preto'
        ]);

       DB::table('cores')->insert([ 
            'nome' => 'Rosa'
        ]);

       DB::table('cores')->insert([ 
            'nome' => 'Roxo'
        ]);

       DB::table('cores')->insert([ 
            'nome' => 'Salmão'
        ]);

       DB::table('cores')->insert([ 
            'nome' => 'Verda'
        ]);

       DB::table('marcas')->insert([ 
            'nome' => 'Fiat'
        ]);

       DB::table('marcas')->insert([ 
            'nome' => 'Chevrolet'
        ]);

       DB::table('marcas')->insert([ 
            'nome' => 'Volkswagen'
        ]);

       DB::table('marcas')->insert([ 
            'nome' => 'Ford'
        ]);

       DB::table('marcas')->insert([ 
            'nome' => 'Toyota'
        ]);

       DB::table('marcas')->insert([ 
            'nome' => 'Renault'
        ]);

       DB::table('modelos')->insert([ 
            'marcas_id' => '1',
            'nome' => 'Idea'
        ]);
       /*
       DB::table('veiculos')->insert([ 
            'user_id' => '1',
            'modelos_id' => '1',
            'cores_id' => '1',
            'ano' => '2011',
            'km' => '70000',
            'placa' => 'NXY2033'
        ]);
          */
       DB::table('montadoras')->insert([ 
            'nome' => 'Renault'
        ]);

       DB::table('montadoras')->insert([ 
            'nome' => 'Toyota'
        ]);

       DB::table('montadoras')->insert([ 
            'nome' => 'Ford'
        ]);

       DB::table('montadoras')->insert([ 
            'nome' => 'Volkswagen'
        ]);

       DB::table('montadoras')->insert([ 
            'nome' => 'Chevrolet'
        ]);

       DB::table('montadoras')->insert([ 
            'nome' => 'Fiat'
        ]);

       DB::table('oficinas')->insert([ 
            'nome' => 'AB AUTO PEÇAS',
            'cnpj' => '13455028000165',
            'email' => 'ACLAYTON.ABAUTOPECAS@HOTMAIL.COM',
            'tel1' => '8423322424',
            'tel2' => '84988776655',
            'tel3' => '84665544335',
            'cep' => '59152600',
            'endereco' => 'AM MARIA LACERDA MONTENEGRO',
            'numero' => '1962',
            'complemento' => '',
            'bairro' => 'NOVA PARNAMIRIM',
            'pontoreferencia' => '',
            'lat' => '',
            'long' => ''
        ]);

       DB::table('categorias')->insert([ 
            'nome' => 'Manutenção'
        ]);

       DB::table('categorias')->insert([ 
            'nome' => 'Vendas'
        ]);

       DB::table('servicos')->insert([ 
            'nome' => 'Alinhamento',
            'categorias_id' => '1'
        ]);

       DB::table('comissoes')->insert([ 
            'comissao' => '10.00',
            'servicos_id' => '1'
        ]);

       DB::table('situacoes')->insert([ 
            'nome' => 'Solicitado'
        ]);

       DB::table('situacoes')->insert([ 
            'nome' => 'Em Atendimento'
        ]);

       DB::table('situacoes')->insert([ 
            'nome' => 'Agendado'
        ]);

       DB::table('situacoes')->insert([ 
            'nome' => 'Confirmado'
        ]);

       DB::table('situacoes')->insert([ 
            'nome' => 'Em Execução'
        ]);

       DB::table('situacoes')->insert([ 
            'nome' => 'Finalizado'
        ]);

       DB::table('situacoes')->insert([ 
            'nome' => 'Avaliado'
        ]);

       DB::table('situacoes')->insert([ 
            'nome' => 'Cancelado'
        ]);

       DB::table('avaliacoes')->insert([ 
            'valor' => '1'
        ]);

       DB::table('avaliacoes')->insert([ 
            'valor' => '2'
        ]);

       DB::table('avaliacoes')->insert([ 
            'valor' => '3'
        ]);

       DB::table('avaliacoes')->insert([ 
            'valor' => '4'
        ]);

       DB::table('avaliacoes')->insert([ 
            'valor' => '5'
        ]);
    }
}
