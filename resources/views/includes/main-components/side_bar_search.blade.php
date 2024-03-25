<div class="h-100 border border-primary rounded  ">
    <div class="search h-75  mb-2 ">
        <form action="{{route('feeds')}}" method="get" class="d-flex h-50 justify-content-center align-items-center flex-column m-2 border border-secondary rounded" method="get ">

            <select name="cities" id="cities">
                <option value="" selected>SELECT CITY</option>
                <option value="casa">Casa</option>
                <option value="Agadir">Agadir</option>
                <option value="Rabat">Rabat</option>
            </select>
            <input type="text" name="search" placeholder="Search..." class="m-2 w-90 border border-primary rounded" />
            <button type="submit" class="w-50 m-2 btn btn-primary">Search</button>
        </form>
    </div>
    <div class="footer m-2 text-dark">
        @include('includes.footer-header-components.footer')
    </div>
</div>