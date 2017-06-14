<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>{!! trans('admin/label.menu_section') !!}</h3>
        <ul class="nav side-menu">
            <li><a href="{{ route('admin.products.index') }}"><i class="fa fa-home"></i> {!! trans('admin/label.products_index') !!} <span class="fa fa-chevron-down"></span></a>
                
            </li>
            <li><a href="{{ route('admin.categories.index') }}"><i class="fa fa-edit"></i> {!! trans('admin/label.categories_index') !!} <span class="fa fa-chevron-down"></span></a>
            
            </li>
            <li><a href="{{ route('admin.brands.index') }}"><i class="fa fa-desktop"></i>{!! trans('admin/label.brand_index') !!} <span class="fa fa-chevron-down"></span></a>
            
            </li>
            <li><a href="{{ route('admin.users.index') }}"><i class="fa fa-table"></i> {!! trans('admin/label.user_index') !!}<span class="fa fa-chevron-down"></span></a>
                
            </li>
            <li><a href="index.html"><i class="fa fa-bar-chart-o"></i> {!! trans('admin/label.data_presentation') !!}<span class="fa fa-chevron-down"></span></a>
                
            </li>
        </ul>
    </div>
</div>

