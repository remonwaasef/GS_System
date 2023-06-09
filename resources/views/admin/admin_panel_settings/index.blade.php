@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Empty</span>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-info btn-icon ml-2"><i class="mdi mdi-filter-variant"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-star"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-warning  btn-icon ml-2"><i class="mdi mdi-refresh"></i></button>
						</div>
						<div class="mb-3 mb-xl-0">
							<div class="btn-group dropdown">
								<button type="button" class="btn btn-primary">14 Aug 2019</button>
								<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="sr-only">Toggle Dropdown</span>
								</button>
								<div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuDate" data-x-placement="bottom-end">
									<a class="dropdown-item" href="#">2015</a>
									<a class="dropdown-item" href="#">2016</a>
									<a class="dropdown-item" href="#">2017</a>
									<a class="dropdown-item" href="#">2018</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title card_title_center">بيانات الضبط العام</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        @if (@isset($data) && !@empty($data))
        <table id="example2" class="table table-bordered table-hover">
         
            <tr>
                <td class="width30">اسم الشركة</td> 
                <td > {{ $data['system_name'] }}</td>
            </tr>

            <tr>
                <td class="width30">كود الشركة</td> 
                <td > {{ $data['com_code'] }}</td>
            </tr>

            <tr>
                <td class="width30">حالة الشركة</td> 
                <td > @if($data['active']==1) مفعل  @else معطل @endif</td>
            </tr>

            <tr>
                <td class="width30">عنوان  الشركة</td> 
                <td > {{ $data['address'] }}</td>
            </tr>

            <tr>
                <td class="width30">هاتف  الشركة</td> 
                <td > {{ $data['phone'] }}</td>
            </tr>

            <tr>
                <td class="width30">  اسم الحساب المالي للعملاء الاب</td> 
                <td > {{ $data['customer_parent_account_name'] }} رقم حساب مالي ( {{ $data["customer_parent_account_number"] }} )</td>
            </tr>
            <tr>
                <td class="width30">  اسم الحساب المالي للموردين الاب</td> 
                <td > {{ $data['supplier_parent_account_name'] }} رقم حساب مالي ( {{ $data["suppliers_parent_account_number"] }} )</td>
            </tr>


            
            <tr>
                <td class="width30">  رسالة التنبية اعلي الشاشة للشركة</td> 
                <td > {{ $data['general_alert'] }}</td>
            </tr>
            <tr>
                <td class="width30">لوجو  الشركة</td> 
                <td >
             <div class="image">
      <img class="custom_img" src="{{ asset('assets/admin/uploads').'/'.$data['photo'] }}"  alt="لوجو الشركة">       
                
            </div>

                </td>
            </tr>
  
            <tr>
                <td class="width30">  تاريخ اخر تحديث</td> 
                <td > 
       @if($data['updated_by']>0 and $data['updated_by']!=null )
    @php
   $dt=new DateTime($data['updated_at']);
   $date=$dt->format("Y-m-d");
   $time=$dt->format("h:i");
   $newDateTime=date("A",strtotime($time));
   $newDateTimeType= (($newDateTime=='AM')?'صباحا ':'مساء'); 
    @endphp
{{ $date }}
{{ $time }}
{{ $newDateTimeType }}
بواسطة 
{{ $data['updated_by_admin'] }}





     @else
لايوجد تحديث
       @endif

<a href="{{ route('admin.adminPanelSetting.edit') }}" class="btn btn-sm btn-success">تعديل</a>


                </td>
            </tr> 
           
          </table>

        @else
  <div class="alert alert-danger">
    عفوا لاتوجد بيانات لعرضها !!
  </div>
        @endif
      


        </div>
      </div>
    </div>
</div>

				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
@endsection