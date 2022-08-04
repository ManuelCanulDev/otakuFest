@extends('layouts.app')

@section('content')
    <script type="text/javascript">
        $(document).ready(function() {
            @foreach ($tickets as $ticket)
                $('.ticket-{{ $ticket->id }} .quantity').on('click keyup change blur', function() {
                    var quantity = parseInt($('.ticket-{{ $ticket->id }} .quantity').val());
                    if (isNaN(quantity)) {
                        quantity = 0;
                        $('.ticket-{{ $ticket->id }} .quantity').val(0);
                    } else if (quantity < 0) {
                        quantity = 0;
                        $('.ticket-{{ $ticket->id }} .quantity').val(0);
                    } else if (quantity > {{ $ticket->cuantos_ticket }}) {
                        quantity = parseInt({{ $ticket->cuantos_ticket }});
                        $('.ticket-{{ $ticket->id }} .quantity').val({{ $ticket->cuantos_ticket }});
                    }
                    var subtotal = parseFloat({{ $ticket->costo_ticket }}) * quantity;
                    $('.ticket-{{ $ticket->id }} .subtotal').text(subtotal.toFixed(2));
                    $('.ticket-{{ $ticket->id }} .rsubtotal').val(subtotal.toFixed(2));
                });
            @endforeach
            $('.quantity').on('click keyup change blur', function() {
                var sum = 0;
                var collection = {
                    tickets: []
                };
                $('.quantity').each(function() {
                    var ticket = {};
                    ticket['id'] = $(this).data('ticket');
                    ticket['amount'] = $(this).val();
                    collection.tickets.push(ticket);
                });
                $('.rsubtotal').each(function() {
                    sum += Number($(this).val());
                    $('.rtotal').val(sum.toFixed(2));
                    $('.total').text(sum.toFixed(2));
                });
                $('input[name=tickets]').val(JSON.stringify(collection));
            });
        });
    </script>
    <div class="container">
        <div class="row mb-2">
            <div class="col-md-6">
                <a href="{{ route('home') }}" class="btn btn-info" role="button">Regresar</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-7">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <img class="logo-panel" src="images/logo.png" alt="Logo">
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="event-meta">
                            <div class="datetime">FECHAS: <span
                                    class="label label-default">{{ '06 Y 07 DE AGOSTO' }}</span></div>
                            <div class="venue">DIRECCION: <span
                                    class="label label-info">{{ 'SINDICATO DE TAXISTAS' }}</span></div>
                        </div>

                        @if (!$tickets->isEmpty())
                            <div class="tickets">
                                <h3>Comprar Tickets</h3>
                                <form action="{{ route('generar-orden') }}" method="POST" id="payment-form">
                                    {{ csrf_field() }}
                                    <table class="table table-tickets">
                                        <thead>
                                            <th>Tipo</th>
                                            <th>Cantidad</th>
                                            <th>Precio</th>
                                            <th>Total</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($tickets as $ticket)
                                                <tr class="ticket-{{ $ticket->id }}">
                                                    <td>{{ $ticket->nombre_ticket }}</td>
                                                    <td><input type="number" class="quantity form-control" min="0"
                                                            max="{{ $ticket->cuantos_ticket }}" step="1"
                                                            value="0" data-ticket="{{ $ticket->id }}">
                                                    </td>
                                                    <td><strong>{{ $ticket->costo_ticket }}&nbsp;MXN</strong></td>
                                                    <td>
                                                        <strong class="subtotal">0.00</strong><strong>&nbsp;MXN</strong>
                                                        <input class="rsubtotal" type="hidden" value="0.00" disabled>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr class="last">
                                                <td colspan="3"></td>
                                                <td><strong class="total">0.00</strong><strong>&nbsp;MXN</strong><input
                                                        type="hidden" name="total" class="rtotal" value="0.00"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <input type="hidden" name="tickets">
                                    <label for="email">Ingrese el correo donde le llegarán los pasos siguientes:</label>
                                    <div class="input-group">
                                        <input required id="email" type="email" name="email" class="form-control"
                                            placeholder="email@example.com">
                                    </div>
                                    <br>
                                    <label for="phone">Ingrese un teléfono donde podemos ponernos en contacto contigo:</label>
                                    <div class="input-group">
                                        <input required id="phone" type="phone" name="phone" class="form-control"
                                            placeholder="000 000 000 0">
                                    </div>
                                    <br>
                                    <button class="btn btn-success" style="float: right">Solicitar Boletos</button>
                                </form>
                            </div>
                        @else
                            <div class="alert alert-warning">Lo Sentimos, el programador no ha cargado los tickets. xD</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
