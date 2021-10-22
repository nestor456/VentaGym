<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $role1 = Role::create(['name'=>'Admin']);

       Permission::create(['name'=>'home','description'=>'ver el dashboard'])->syncRoles([$role1]);
    //users
        Permission::create(['name'=>'admin.users.index','description'=>'Ver listado de usuarios'])->assignRole([$role1]);
        Permission::create(['name'=>'admin.users.create','description'=>'Crear usuario'])->assignRole([$role1]);
        Permission::create(['name'=>'admin.users.update','description'=>'Editar usuarios'])->assignRole([$role1]);
        Permission::create(['name'=>'admin.users.destroy','description'=>'Eliminar usuarios'])->assignRole([$role1]);
    
    //roles
        Permission::create(['name'=>'admin.roles.index','description'=>'Ver listado de roles'])->assignRole([$role1]);
        Permission::create(['name'=>'admin.roles.create','description'=>'Crear un rol'])->assignRole([$role1]);
        Permission::create(['name'=>'admin.roles.update','description'=>'Editar roles'])->assignRole([$role1]);
        Permission::create(['name'=>'admin.roles.destroy','description'=>'Eliminar roles'])->assignRole([$role1]);

    //Empleados
       Permission::create(['name'=>'admin.empleado.index','description'=>'Ver listado de empleados'])->assignRole([$role1]);
       Permission::create(['name'=>'admin.empleado.create','description'=>'Crear empleado'])->assignRole([$role1]);
       Permission::create(['name'=>'admin.empleado.update','description'=>'Editar empleado'])->assignRole([$role1]);
       Permission::create(['name'=>'admin.empleado.destroy','description'=>'Eliminar empleado'])->assignRole([$role1]);

    //area
        Permission::create(['name'=>'admin.area.index','description'=>'Ver listado de areas'])->assignRole([$role1]);
        Permission::create(['name'=>'admin.area.create','description'=>'Crear area'])->assignRole([$role1]);
        Permission::create(['name'=>'admin.area.update','description'=>'Editar area'])->assignRole([$role1]);
        Permission::create(['name'=>'admin.area.destroy','description'=>'Eliminar area'])->assignRole([$role1]);

    //membresia
        Permission::create(['name'=>'admin.membresia.index','description'=>'Ver listado de membresias'])->assignRole([$role1]);
        Permission::create(['name'=>'admin.membresia.create','description'=>'Crear menbresia'])->assignRole([$role1]);
        Permission::create(['name'=>'admin.membresia.update','description'=>'Editar membresia'])->assignRole([$role1]);
        Permission::create(['name'=>'admin.membresia.destroy','description'=>'Eliminar membresia'])->assignRole([$role1]);

    //producto
        Permission::create(['name'=>'admin.producto.index','description'=>'Ver listado de productos'])->assignRole([$role1]);
        Permission::create(['name'=>'admin.producto.create','description'=>'Crear producto'])->assignRole([$role1]);
        Permission::create(['name'=>'admin.producto.update','description'=>'Editar producto'])->assignRole([$role1]);
        Permission::create(['name'=>'admin.producto.destroy','description'=>'Eliminar producto'])->assignRole([$role1]);

    //cliente
        Permission::create(['name'=>'admin.cliente.index','description'=>'Ver listado de clientes'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.cliente.create','description'=>'Crear cliente'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.cliente.update','description'=>'Editar cliente'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.cliente.destroy','description'=>'Eliminar cliente'])->syncRoles([$role1]);

    //venta
        Permission::create(['name'=>'admin.venta.index','description'=>'Ver listado de ventas'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.venta.create','description'=>'Crear venta'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.venta.destroy','description'=>'Eliminar venta'])->assignRole([$role1]);

    //asistencia
        Permission::create(['name'=>'admin.asistencia.index','description'=>'Ver asistencia de empleados'])->syncRoles([$role1]);

    //asistencia_cliente
        Permission::create(['name'=>'admin.asistencia_cliente.index','description'=>'ver asistencia de clientes'])->syncRoles([$role1]);
    }

    
}
