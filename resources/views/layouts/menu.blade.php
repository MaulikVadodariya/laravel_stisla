<li class="side-menus {{ Request::is('companies*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('companies.index') }}"><i class="fas fa-building"></i><span>Companies</span></a>
</li>

<li class="side-menus {{ Request::is('employees*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('employees.index') }}"><i class="fas fa-building"></i><span>Employees</span></a>
</li>


