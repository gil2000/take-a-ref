@extends('users.layouts.app')

@section('content')

    <div class="container pb-5 mb-2 mb-md-4">
        <div class="row">
            <!-- List of items-->
            <section class="col-lg-8">
                <div class="d-flex justify-content-between align-items-center pt-3 pb-4 pb-sm-5 mt-1">
                    <form method="post" action="{{ route('apagarcarrinho') }}">
                        <button class="btn px-0 text-danger" type="submit"><i class="fas fa-times"></i><span class="fs-sm"> Apagar Carrinho</span></button>
                    </form>
                </div>
                <!-- Item-->
                @foreach(Cart::content() as $row)
                    <div class="d-sm-flex justify-content-between align-items-center pb-3 border-bottom">
                        <div class="d-block d-sm-flex align-items-center text-center text-sm-start"><a class="d-inline-block flex-shrink-0 mx-auto me-sm-4" href="shop-single-v1.html"></a>
                            <div class="pt-2">
                                <h3 class="product-title fs-base mb-2">{{ $row->name }}</h3>
                            </div>
                        </div>
                            <div class="pt-2 pt-sm-0 ps-sm-3 mx-auto mx-sm-0 text-center text-sm-start" style="max-width: 9rem;">
                                <form method="POST" action="{{ route('removeritem', $row->id)}}">
                                    @csrf
                                    <label class="form-label" for="quantity4">Quantidade</label>
                                    <input class="form-control" type="number" id="quantity4" min="1" value="1">
                                    <button onclick="" class="btn px-0 text-danger" type="submit"><i class="fas fa-times"></i><span class="fs-sm"> Remove</span></button>
                                </form>
                            </div>


                    </div>
                @endforeach
                <button class="btn btn-primary d-block w-100 mt-4" type="button"><i class="fas fa-sync-alt"></i> Atualizar Carrinho</button>
            </section>
            <!-- Sidebar-->
            <aside class="col-lg-4 pt-4 pt-lg-0 ps-xl-5">
                <div class="bg-white rounded-3 shadow-lg p-4">
                    <div class="py-2 px-xl-2">
                        <div class="text-center mb-4 pb-3 border-bottom">
                            <h2 class="h6 mb-3 pb-1">Subtotal</h2>
                            <h3 class="fw-normal">{{Cart::total()}} €</h3>

                        </div>
                        <a class="btn btn-primary btn-shadow d-block w-100 mt-4" href="{{ route('pagar') }}"><i class="ci-card fs-lg me-2"></i>Proceder para pagamento</a>
                    </div>
                </div>
            </aside>
        </div>
    </div>


@endsection
{{--<table>--}}
{{--    <thead>--}}
{{--    <tr>--}}
{{--        <th>Product</th>--}}
{{--        <th>Qty</th>--}}
{{--        <th>Price</th>--}}
{{--        <th>Subtotal</th>--}}
{{--    </tr>--}}
{{--    </thead>--}}

{{--    <tbody>--}}

{{--    <?php foreach(Cart::content() as $row) :?>--}}

{{--    <tr>--}}
{{--        <td>--}}
{{--            <p><strong><?php echo $row->name; ?></strong></p>--}}
{{--            <p><?php echo ($row->options->has('size') ? $row->options->size : ''); ?></p>--}}
{{--        </td>--}}
{{--        <td><input type="text" value="<?php echo $row->qty; ?>"></td>--}}
{{--        <td>$<?php echo $row->price; ?></td>--}}
{{--        <td>$<?php echo $row->total; ?></td>--}}
{{--    </tr>--}}

{{--    <?php endforeach;?>--}}

{{--    </tbody>--}}

{{--    <tfoot>--}}
{{--    <tr>--}}
{{--        <td colspan="2">&nbsp;</td>--}}
{{--        <td>Subtotal</td>--}}
{{--        <td><?php echo Cart::subtotal(); ?></td>--}}
{{--    </tr>--}}
{{--    <tr>--}}
{{--        <td colspan="2">&nbsp;</td>--}}
{{--        <td>Tax</td>--}}
{{--        <td><?php echo Cart::tax(); ?></td>--}}
{{--    </tr>--}}
{{--    <tr>--}}
{{--        <td colspan="2">&nbsp;</td>--}}
{{--        <td>Total</td>--}}
{{--        <td><?php echo Cart::total(); ?></td>--}}
{{--    </tr>--}}
{{--    </tfoot>--}}
{{--</table>--}}
