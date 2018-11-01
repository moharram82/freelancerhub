@extends('freelancer.partials.layout')

@section('freelancer-contents')
<div class="box">

    <h2>{{ $contract->proposal->title }}</h2>

    <table class="meta-data">
        <tr>
            <td>Customer</td>
            <td class="data">{{ $contract->proposal->customer->name }}</td>
        </tr>
        <tr>
            <td>Start</td>
            <td class="data">{{ $contract->proposal->start_date }}</td>
        </tr>
        <tr>
            <td>Cost</td>
            <td class="data">SDG{{ $contract->proposal->price }}</td>
        </tr>
        <tr>
            <td>Proposal</td>
            <td class="data"><a href="{{ BASEURL }}/freelancers/proposal.php?proposal_id={{ $contract->proposal->id }}">{{ $contract->proposal->title }}</a></td>
        </tr>
        <tr>
            <td>Signed on</td>
            <td class="data">{{ $contract->created_at }}</td>
        </tr>
    </table>

    <h5>Details</h5>

    {!! $contract->proposal->details !!}

    {{--<h5>Stages</h5>--}}
    {{--<br>--}}

    {{--<div class="accordion" id="accordionExample">--}}
    {{--<div class="card">--}}
    {{--<div class="card-header" id="headingOne">--}}
    {{--<h5 class="mb-0">--}}
    {{--<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">--}}
    {{--<span class="stage-title">Stage One</span>--}}
    {{--<span class="stage-timing">Start: 2018-10-27 - End: 2018-11-25</span>--}}
    {{--</button>--}}
    {{--</h5>--}}
    {{--<span class="stage-status stage-status-completed" title="Active"></span>--}}
    {{--</div>--}}

    {{--<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">--}}
    {{--<div class="card-body">--}}
    {{--<h5>Details</h5>--}}
    {{--<p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>--}}
    {{--<p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="card">--}}
    {{--<div class="card-header" id="headingOne">--}}
    {{--<h5 class="mb-0">--}}
    {{--<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseOne">--}}
    {{--<span class="stage-title">Stage Two</span>--}}
    {{--<span class="stage-timing">Start: 2018-10-27 - End: 2018-11-25</span>--}}
    {{--</button>--}}
    {{--</h5>--}}
    {{--<span class="stage-status stage-status-completed" title="Active"></span>--}}
    {{--</div>--}}

    {{--<div id="collapseTwo" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">--}}
    {{--<div class="card-body">--}}
    {{--<h5>Details</h5>--}}
    {{--<p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>--}}
    {{--<p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="card">--}}
    {{--<div class="card-header" id="headingOne">--}}
    {{--<h5 class="mb-0">--}}
    {{--<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseOne">--}}
    {{--<span class="stage-title">Stage Three</span>--}}
    {{--<span class="stage-timing">Start: 2018-10-27 - End: 2018-11-25</span>--}}
    {{--</button>--}}
    {{--</h5>--}}
    {{--<span class="stage-status stage-status-completed" title="Active"></span>--}}
    {{--</div>--}}

    {{--<div id="collapseThree" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">--}}
    {{--<div class="card-body">--}}
    {{--<h5>Details</h5>--}}
    {{--<p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>--}}
    {{--<p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}

</div>
@endsection