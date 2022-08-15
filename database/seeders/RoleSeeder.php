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
        Permission::create(['name'=>'users.index','description'=>'Ver listado de usuarios'])->assignRole([$role1]);
        Permission::create(['name'=>'users.create','description'=>'Crear usuario'])->assignRole([$role1]);
        Permission::create(['name'=>'users.update','description'=>'Editar usuarios'])->assignRole([$role1]);
        Permission::create(['name'=>'users.destroy','description'=>'Eliminar usuarios'])->assignRole([$role1]);
    
    //roles
        Permission::create(['name'=>'roles.index','description'=>'Ver listado de roles'])->assignRole([$role1]);
        Permission::create(['name'=>'roles.create','description'=>'Crear un rol'])->assignRole([$role1]);
        Permission::create(['name'=>'roles.update','description'=>'Editar roles'])->assignRole([$role1]);
        Permission::create(['name'=>'roles.destroy','description'=>'Eliminar roles'])->assignRole([$role1]);

    //Empleados
       Permission::create(['name'=>'empleado.index','description'=>'Ver listado de empleados'])->assignRole([$role1]);
       Permission::create(['name'=>'empleado.create','description'=>'Crear empleado'])->assignRole([$role1]);
       Permission::create(['name'=>'empleado.update','description'=>'Editar empleado'])->assignRole([$role1]);
       Permission::create(['name'=>'empleado.destroy','description'=>'Eliminar empleado'])->assignRole([$role1]);

    //area
        /*Permission::create(['name'=>'area.index','description'=>'Ver listado de areas'])->assignRole([$role1]);
        Permission::create(['name'=>'area.create','description'=>'Crear area'])->assignRole([$role1]);
        Permission::create(['name'=>'area.update','description'=>'Editar area'])->assignRole([$role1]);
        Permission::create(['name'=>'area.destroy','description'=>'Eliminar area'])->assignRole([$role1]);

    //membresia
        Permission::create(['name'=>'membresia.index','description'=>'Ver listado de membresias'])->assignRole([$role1]);
        Permission::create(['name'=>'membresia.create','description'=>'Crear menbresia'])->assignRole([$role1]);
        Permission::create(['name'=>'membresia.update','description'=>'Editar membresia'])->assignRole([$role1]);
        Permission::create(['name'=>'membresia.destroy','description'=>'Eliminar membresia'])->assignRole([$role1]);*/

    //producto
        Permission::create(['name'=>'producto.index','description'=>'Ver listado de productos'])->assignRole([$role1]);
        Permission::create(['name'=>'producto.create','description'=>'Crear producto'])->assignRole([$role1]);
        Permission::create(['name'=>'producto.update','description'=>'Editar producto'])->assignRole([$role1]);
        Permission::create(['name'=>'producto.destroy','description'=>'Eliminar producto'])->assignRole([$role1]);

    //cliente
        Permission::create(['name'=>'cliente.index','description'=>'Ver listado de clientes'])->syncRoles([$role1]);
        Permission::create(['name'=>'cliente.create','description'=>'Crear cliente'])->syncRoles([$role1]);
        Permission::create(['name'=>'cliente.update','description'=>'Editar cliente'])->syncRoles([$role1]);
        Permission::create(['name'=>'cliente.destroy','description'=>'Eliminar cliente'])->syncRoles([$role1]);

    //venta
        Permission::create(['name'=>'venta.index','description'=>'Ver listado de ventas'])->syncRoles([$role1]);
        Permission::create(['name'=>'venta.create','description'=>'Crear venta'])->syncRoles([$role1]);
        Permission::create(['name'=>'venta.update','description'=>'Editar venta'])->syncRoles([$role1]);
        Permission::create(['name'=>'venta.destroy','description'=>'Eliminar venta'])->assignRole([$role1]);

    //asistencia
        Permission::create(['name'=>'asistencia.index','description'=>'Ver asistencia de empleados'])->syncRoles([$role1]);

    //asistencia_cliente
        Permission::create(['name'=>'asistencia_cliente.index','description'=>'ver asistencia de clientes'])->syncRoles([$role1]);

    //Reporte por dia
        Permission::create(['name'=>'reports.day','description'=>'reporte por dia'])->syncRoles([$role1]);
    
    //Reporte por mes
        Permission::create(['name'=>'reports.date','description'=>'reporte por mes'])->syncRoles([$role1]);
    
    }
    

    
}
