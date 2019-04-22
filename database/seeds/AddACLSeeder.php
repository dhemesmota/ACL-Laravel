<?php

use Illuminate\Database\Seeder;

class AddACLSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminACL = \App\Role::firstOrCreate(['name'=>'Administrador'],[
            'description' => 'Função de administrador'
        ]);
        $gerenteACL = \App\Role::firstOrCreate(['name'=>'Gerente'],[
            'description' => 'Função de gerente'
        ]);
        $usuarioACL = \App\Role::firstOrCreate(['name'=>'Usuario'],[
            'description' => 'Função de usuário'
        ]);

        // Relacionamento User com Role
        $userAdministrador = \App\User::find(1);
        $userGerente = \App\User::find(2);
        $userUsuario = \App\User::find(3);

        $userAdministrador->roles()->attach($adminACL);
        $userGerente->roles()->attach($gerenteACL);
        $userUsuario->roles()->attach($usuarioACL);

        // Permissions
        $listUser = \App\Permission::firstOrCreate(['name'=>'list-user'],[
            'description' => 'Listar registros'
        ]);
        $createUser = \App\Permission::firstOrCreate(['name'=>'create-user'],[
            'description' => 'Criar registros'
        ]);
        $editUser = \App\Permission::firstOrCreate(['name'=>'edit-user'],[
            'description' => 'Atualizar registros'
        ]);
        $showUser = \App\Permission::firstOrCreate(['name'=>'show-user'],[
            'description' => 'Visualizar registros'
        ]);
        $deleteUser = \App\Permission::firstOrCreate(['name'=>'delete-user'],[
            'description' => 'Deletar registros'
        ]);

        // Relacionar Role com Permissio
        $gerenteACL->permissions()->attach($listUser);

        echo "Registros de ACL criado! \n";
    }
}
