@extends('admin.layout')
@section('title', 'User Dashboard')
@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">My Subscription</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Join Date</th>
                                <th>Subsription</th>
                                @if($data[0]->is_trial == 1)
                                <th>Trial End</th>
                                @endif
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    {{$data[0]->created_at}}
                                </td>
                                <td>
                                    {{$data[0]->title}}
                                </td>
                                @if($data[0]->is_trial == 1)
                                <td>
                                    {{$data[0]->trial_end}}
                                </td>
                                @endif
                                <td class="text-right">
                                    @if($data[0]->is_trial == 1)
                                    <button type="button" class="btn btn-success" onclick="upgrade({{$data[0]->id}})">
                                        Upgrade Plan
                                    </button>
                                    @endif
                                    <button type="button" class="btn btn-danger" onclick="cancel({{$data[0]->id}})">
                                        Cancel Subscription
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal FORM-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upgrade Plan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3>{{$data[0]->title}}</h3>
                <h3>${{$data[0]->price}}</h3>
                <form action="/pay-upgrade" method="POST">
                    @csrf
                    <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                        data-key="pk_test_C1Dps41NlB8MZT1fetvxQ3VU00MkEEzzJG" data-amount="{{$data[0]->price}}00"
                        data-name="{{$data[0]->title}} Membership" data-description="Argon Membership"
                        data-image="https://stripe.com/img/documentation/checkout/marketplace.png" data-local="auto"
                        data-currency="usd">
                    </script>
                    <input type="hidden" name="id_user" value="{{$data[0]->id_user}}" />
                    <input type="hidden" name="description" value="Upgrade Subscripton for {{$data[0]->title}}" />
                    <input type="hidden" name="amount" value="{{$data[0]->price}}" />
                </form>

            </div>
        </div>
    </div>
</div>

<script>
function cancel(idplan) {
    $("#exampleModal").modal()
}

function upgrade(idplan) {
    // alert(idplan)
    $("#exampleModal").modal()

}
</script>
@stop