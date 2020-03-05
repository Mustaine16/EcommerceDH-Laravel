@extends('layout.plantilla')

@section("estilos")
<link rel="stylesheet" href="{{asset('css/carrito.css')}}" />
@endsection

@section("title", "Carrito")

@section("main")
<section class="container fix-height">

        <h1 class="pl-3">Tu Carrito</h1>

        <!-- <table class=" table text-center">
            <thead class=" thead-dark text-white">
                <tr>
                    <th scope="col">Imagen</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col" colspan="2">Precio</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><img class="img-thumbnail" src="{{asset('img/1.png')}}" alt=""></td>
                    <td>Samsung Galaxy A8</td>
                    <td>
                        <select name="p-1">
                          <option value="uno">1</option>
                          <option value="dos">2</option>
                          <option value="tres">3</option>
                        </select>
                    </td>
                    <td>$20.999</td>
                    <td><i class="fas fa-trash-alt"></i></td>
                </tr>
                <tr>
                <td><img class="img-thumbnail" src="{{asset('img/2.png')}}" alt=""></td>
                    <td>Moto E6 Plus</td>
                    <td>
                        <select name="p-2">
                          <option value="uno">1</option>
                          <option value="dos">2</option>
                          <option value="tres">3</option>
                        </select>
                    </td>
                    <td>$15.999</td>
                    <td><i class="fas fa-trash-alt"></i></td>
                </tr>
                <tr>
                <td><img class="img-thumbnail" src="{{asset('img/3.png')}}" alt=""></td>
                    <td>Google Pixel 2</td>
                    <td>
                        <select name="p-3">
                          <option value="uno">1</option>
                          <option value="dos">2</option>
                          <option value="tres">3</option>
                        </select>
                    </td>
                    <td>$25.999</td>
                    <td><i class="fas fa-trash-alt"></i></td>
                </tr>
            </tbody>
            <tfoot class="font-weight-bold text-white">
                <tr class="bg-secondary">
                    <td>TOTAL</td>
                    <td colspan="2">$62997</td>
                    
                </tr>
                <tr class="border-0 ">
                    <td colspan="4 "><button class="bg-success text-white p-1 ">COMPRAR</button></td>
                </tr>
            </tfoot>
        </table> -->

        <ul>
            <li>
                <div class="producto_datos">
                    <img src="{{asset('img/1.png')}}" alt="producto" width="40px">
                    <p class="producto_nombre">Galaxy A5</p>
                    <p class="producto_precio">$ 25.000</p>
                </div>
                <div class="actions_container">
                    <div class="contador">
                        <button>-</button>
                        <span class="cantidad">3</span>
                        <button>+</button>
                    </div>
                    <button class="btn btn-danger">eliminar</button>
                </div>
            </li>
            <li>
                <div class="producto_datos">
                    <img src="{{asset('img/2.png')}}" alt="producto" width="40px">
                    <p class="producto_nombre">Redmi Note 8</p>
                    <p class="producto_precio">$ 35.000</p>
                </div>
                <div class="actions_container">
                    <div class="contador">
                        <button>-</button>
                        <span class="cantidad">3</span>
                        <button>+</button>
                    </div>
                    <button class="btn btn-danger">eliminar</button>
                </div>
            </li>
        </ul>

    </section>

@endsection