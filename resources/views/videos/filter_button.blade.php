<form class="col-md-8 pull-right" action="{{route($action, $search ?? '')}}" method="GET">
    <label for="filter">Filter</label>
    <select name="filter" class="form-control">
        <option value="new">Newest first</option>
        <option value="old">Oldest first</option>
        <option value="alpha">From A to Z</option>
    </select>
    <input type="submit" value="Order" class="btn btn-sm btn-primary" />
</form>