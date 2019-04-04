@if($role == 1 && get_second_role($id) == 2)
<span class="label label-success">HR</span>
@endif


@if($role == 1 && get_second_role($id) == 3)
<span class="label label-primary">FR</span>
@endif


@if($role == 2)
<span class="label label-primary">Doctor</span>
@endif


@if($role == 3)
<span class="label label-primary">Secratry</span>
@endif