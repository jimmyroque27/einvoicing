<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('home')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <span class="fas fa-file-invoice-dollar text-success "></span>
        </div>
        <div class="sidebar-brand-text mx-3 font-weight-bolder" style="font-family:'Arial Black';font-size:1.06em">
            <span class="text-success ">E-</span><span class="text-warning">I<span class="text-lowercase">nvoicing</span></span><span >.PH</span>
            <!-- {{ config('app.name', 'Laravel') }}  -->
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item ">
        <a class="nav-link" href="{{route('home')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard  </span></a>
    </li>

    <!-- Divider -->
        <hr class="sidebar-divider  my-0">
    <!-- Nav Item - e-Invoice -->
    @can('invoice-list','invoice-create')
        <li class="nav-item"  >
               
            <a class="nav-link collapsed pb-2 pt-1" href="#" data-toggle="collapse" data-target="#navTransaction"
                aria-expanded="true" aria-controls="navTransaction">
                <i class="fas fa-fw fa-file-invoice"></i>
                <span>Transactions</span>
            </a>
            <div id="navTransaction" class="collapse"  data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    @can('invoice-list','invoice-create')
                        <a class="collapse-item pl-1" href="{{ route('invoices.index') }}">
                            
                            <i class="fas fa-fw fa-list"></i>
                            <span>Invoice List</span>
                        </a>
                    @endcan
                    @can('invoice-create')
                        <a class="collapse-item pl-1" href="{{ route('invoices.create') }}">
                            <i class="fas fa-fw fa-plus-square"></i>
                            <span>Add Invoice</span>
                        </a>
                    @endcan
                    @can('receipt-create')
                        <a class="collapse-item pl-1" href="{{ route('invoices.create') }}">
                            <i class="fas fa-fw fa-plus-square"></i>
                            <span>Add Official Receipt</span>
                        </a>    
                    @endcan

                
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider mb-2">
        <!-- Heading -->
    @endcan
        

    <!-- Nav Item - Tax Payer File Manager -->
    @can('taxpayer-list','taxpayer-create')
        <li class="nav-item"  >
            <a class="nav-link collapsed pb-2 pt-1" href="#" data-toggle="collapse" data-target="#navTaxPayer"
                aria-expanded="true" aria-controls="navTaxPayer">
                <i class="fas fa-fw fa-registered"></i>
                <span>Tax Payers</span>
            </a>
            <div id="navTaxPayer" class="collapse"  data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    @can('taxpayer-list')
                        <a class="collapse-item pl-1" href="{{ route('taxpayers.index') }}">
                            
                            <i class="fas fa-fw fa-list"></i>
                            <span>Tax Payers List</span>
                        </a>
                    @endcan
                    @can('taxpayer-create')
                        <a class="collapse-item pl-1" href="{{ route('taxpayers.create') }}">
                                <i class="fas fa-fw fa-plus-square"></i>
                                <span>Add Tax Payer</span>
                        </a>    
                    @endcan
                
                </div>
            </div>
        </li> 
    @endcan
    <!-- Nav Item - Contacts File Manager -->
    @can('contact-list','contact-create')
        <li class="nav-item"  >
            <a class="nav-link collapsed pb-2 pt-1" href="#" data-toggle="collapse" data-target="#navContact"
                aria-expanded="true" aria-controls="navContact">
                <i class="fas fa-fw fa-address-book"></i>
                <span>Contacts</span>
            </a>
            <div id="navContact" class="collapse"  data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    @can('contact-list')
                        <a class="collapse-item pl-1" href="{{ route('contacts.index') }}">
                            
                            <i class="fas fa-fw fa-list"></i>
                            <span>Contacts List</span>
                        </a>
                    @endcan
                    @can('contact-create')
                        <a class="collapse-item pl-1" href="{{ route('contacts.create') }}">
                                <i class="fas fa-fw fa-plus-square"></i>
                                <span>Add Contacts</span>
                        </a>   
                    @endcan 

                
                </div>
            </div>
        </li> 
    @endcan
    {{-- <!-- Nav Item - Buyer File Manager -->
    <li class="nav-item"  >
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#navBuyer"
            aria-expanded="true" aria-controls="navBuyer">
            <i class="fas fa-fw fa-folder"></i>
            <span>Buyer Management</span>
        </a>
        <div id="navBuyer" class="collapse"  data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
             
                <a class="collapse-item pl-1" href="{{ route('buyers.index') }}">
                     
                     <i class="fas fa-fw fa-list"></i>
                     <span>Buyer List</span>
                 </a>
                <a class="collapse-item pl-1" href="{{ route('buyers.create') }}">
                        <i class="fas fa-fw fa-plus-square"></i>
                        <span>Add Buyer</span>
                </a>    

            
            </div>
        </div>
    </li>  --}}

    <!-- Nav Item - Product File Manager -->
    @can('product-list','product-create','category-list','category-create')
        <li class="nav-item">
            <a class="nav-link collapsed pb-2 pt-1" href="#" data-toggle="collapse" data-target="#navProduct"
                aria-expanded="true" aria-controls="navProduct">
                <i class="fas fa-fw fa-qrcode"></i>
                <span>Products</span>
            </a>
            <div id="navProduct" class="collapse"  data-parent="#accordionSidebar">
                @can('product-list','product-create')
                    <div class="bg-white py-2 collapse-inner rounded">
                        @can('product-list')
                            <a class="collapse-item pl-1" href="{{ route('products.index') }}">
                                
                                <i class="fas fa-fw fa-list"></i>
                                <span>Product List</span>
                            </a>
                        @endcan
                        @can('product-create')
                            <a class="collapse-item pl-1" href="{{ route('products.create') }}">
                                    <i class="fas fa-fw fa-plus-square"></i>
                                    <span>Add Product</span>
                            </a>    
                        @endcan
                    </div>
                @endcan
                @can('category-list','category-create')
                    <div class="bg-white py-2 collapse-inner rounded">
                        @can('category-list')
                            <a class="collapse-item pl-1" href="{{ route('category.index') }}">
                                
                                <i class="fas fa-fw fa-list"></i>
                                <span>Category List</span>
                            </a>
                        @endcan
                        @can('category-create')
                            <a class="collapse-item pl-1" href="{{ route('category.create') }}">
                                    <i class="fas fa-fw fa-plus-square"></i>
                                    <span>Add Category</span>
                            </a>    
                        @endcan
                    
                    </div>
                @endcan
            </div>
        </li> 
    @endcan


    @can('user-list','user-create','permission-list','permission-create','role-list','role-create',
         'atc-list','atc-create','currency-list','currency-create')
        <!-- Divider -->
         

        <!-- Heading -->
        <div class="sidebar-heading  p-1 pl-3 pr-3">
            <div class="col-sm-12 bg-warning text-dark p-1 text-center rounded">
                Administration
            </div>
        </div>
         
        <!-- Users -->
        @can('user-list','user-create','permission-list','permission-create','role-list','role-create')
            <li class="nav-item">
                <a class="nav-link collapsed pb-2 pt-1" href="#" data-toggle="collapse" data-target="#navUser"
                    aria-expanded="true" aria-controls="navUser">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Users</span>
                </a>
                <div id="navUser" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    @can('user-list','user-create')
                        <div class="bg-white py-2 collapse-inner rounded">
                            
                            @can('user-list' )
                                
                                <a class="collapse-item pl-1" href="{{ route('users.index') }}">
                                    <i class="fas fa-fw fa-list"></i>
                                    User's List
                                </a>
                            @endcan
                            @can( 'user-create')
                                
                                <a class="collapse-item pl-1" href="{{ route('users.create')}}">
                                    <i class="fas  fa-fw fa-user-plus"></i>
                                    <span>Add User</span>
                                </a>
                            @endcan
                        </div>
                    @endcan
                    @can('permission-list','permission-create')
                        <div class="bg-white py-2 collapse-inner rounded">
                            @can('permission-list')
                                <a class="collapse-item pl-1" href="{{ route('admin.permission.index') }}">
                                    <i class="fas fa-fw fa-list"></i>
                                    Permission List
                                </a>
                            @endcan
                            @can('permission-create')
                                <a class="collapse-item pl-1" href="{{ route('admin.permission.create')}}">
                                    <i class="fas fa-fw fa-plus-square"></i>
                                    Add Permission
                                </a>
                            @endcan
                        </div>
                    @endcan
                    @can('role-list','role-create')
                        <div class="bg-white py-2 collapse-inner rounded">
                            @can('role-list')
                                <a class="collapse-item pl-1" href="{{ route('admin.role.index') }}">
                                    <i class="fas fa-fw fa-list"></i>
                                    Role List
                                </a>
                            @endcan

                            @can('role-create')
                                <a class="collapse-item pl-1" href="{{ route('admin.role.create')}}">
                                    <i class="fas fa-fw fa-plus-square"></i>
                                    Add Role
                                </a>
                            @endcan
                        </div>
                    @endcan
                </div>
            </li>
        @endcan
        @can('atc-list','atc-create' )
            <li class="nav-item">
                <a class="nav-link collapsed pb-2 pt-1" href="#" data-toggle="collapse" data-target="#navATC"
                    aria-expanded="true" aria-controls="navATC">
                    <i class="fas fa-fw fa-spinner"></i>
                    <span>Alpha Tax Code (ATC)</span>
                </a>
                <div id="navATC" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    
                    <div class="bg-white py-2 collapse-inner rounded">
                        
                        @can('atc-list' )
                            
                            <a class="collapse-item pl-1" href="{{ route('atc.index') }}">
                                <i class="fas fa-fw fa-list"></i>
                                ATC List
                            </a>
                        @endcan
                        @can( 'atc-create')
                            
                            <a class="collapse-item pl-1" href="{{ route('atc.create')}}">
                                <i class="fas fa-fw fa-plus-square"></i>
                                Add ATC
                            </a>
                        @endcan
                    </div>
                     
                     
                    
                </div>
            </li>
        @endcan
        @can('currency-list','currency-create')
            <li class="nav-item">
                <a class="nav-link collapsed pb-2 pt-1" href="#" data-toggle="collapse" data-target="#navCurrency"
                    aria-expanded="true" aria-controls="navCurrency">
                    <i class="fas fa-fw fa-money-bill-wave"></i>
                    <span>Currency</span>
                </a>
                <div id="navCurrency" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                     
                     
                    <div class="bg-white py-2 collapse-inner rounded">
                        @can('currency-list')
                            <a class="collapse-item pl-1" href="{{ route('admin.permission.index') }}">
                                <i class="fas fa-fw fa-list"></i>
                                Currency List
                            </a>
                        @endcan
                        @can('currency-create')
                            <a class="collapse-item pl-1" href="{{ route('admin.permission.create')}}">
                                <i class="fas fa-fw fa-plus-square"></i>
                                Add Currency
                            </a>
                        @endcan
                    </div>
                     
                    
                </div>
            </li>
        @endcan
         <!-- Divider -->
         <hr class="sidebar-divider d-none d-md-block">
    @endcan
    
    

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>