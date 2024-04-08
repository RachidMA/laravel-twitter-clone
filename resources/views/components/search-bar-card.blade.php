@props(['formRoute'])


<div class="h-100 border border-primary rounded  ">
    <div class="search h-75  mb-2 ">
        <form action="{{$formRoute}}" method="get" class="d-flex h-50 justify-content-center align-items-center flex-column m-2 border border-secondary rounded" method="get ">
            <input type="text" name="search" placeholder="Search..." class="m-2 w-90 border border-primary rounded px-2" value="{{request()->get('search')}}" />
            <select name="cities" id="cities" class="w-75 border border-light shadow rounded my-4">
                <option value="" selected>SELECT CITY</option>
            </select>
            @admin
            <div class="result-to-admin">
                <input type="checkbox" name="authorized" value="true" class="checkbox-input"><span>Results to dashboard?</span>
            </div>
            @endadmin
            <button type="submit" class="w-50 m-2 btn btn-primary">Search</button>
        </form>
    </div>
    <div class="footer m-2 text-dark">
        @include('includes.footer-header-components.footer')
    </div>
</div>