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
          <h3 class="card-title card_title_center">تعديل بيانات الضبط العام</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        @if (@isset($data) && !@empty($data))
      <form action="{{ route('admin.adminPanelSetting.update') }}" method="post" enctype="multipart/form-data">
        @csrf
      <div class="form-group">
<label>اسم الشركة</label>
<input name="system_name" id="system_name" class="form-control" value="{{ $data['system_name'] }}" placeholder="ادخل اسم الشركة" oninvalid="setCustomValidity('من فضلك ادخل هذا الحقل')" onchange="try{setCustomValidity('')}catch(e){}" >
@error('system_name')
<span class="text-danger">{{ $message }}</span>
@enderror
</div>


      <div class="form-group">
        <label>عنوان الشركة</label>
        <input name="address" id="address" class="form-control" value="{{ $data['address'] }}" placeholder="ادخل اسم الشركة" oninvalid="setCustomValidity('من فضلك ادخل هذا الحقل')" onchange="try{setCustomValidity('')}catch(e){}"  >
        @error('address')
        <span class="text-danger">{{ $message }}</span>
        @enderror  
      </div>
        
              <div class="form-group">
                <label>هاتف الشركة</label>
                <input name="phone" id="phone" class="form-control" value="{{ $data['phone'] }}" placeholder="ادخل اسم الشركة" oninvalid="setCustomValidity('من فضلك ادخل هذا الحقل')" onchange="try{setCustomValidity('')}catch(e){}" >
                @error('phone')
                <span class="text-danger">{{ $message }}</span>
                @enderror   
              </div>


                <div class="form-group"> 
                  <label>    الحساب الاب للعملاء بالشجرة المحاسبية</label>
                  <select name="customer_parent_account_number" id="customer_parent_account_number" class="form-control ">
                    <option value="">اختر الحساب </option>
                    @if (@isset($parent_accounts) && !@empty($parent_accounts))
                   @foreach ($parent_accounts as $info )
                     <option @if(old('customer_parent_account_number',$data['customer_parent_account_number'])==$info->account_number) selected="selected" @endif value="{{ $info->account_number }}"> {{ $info->name }} </option>
                   @endforeach
                    @endif
                  </select>
                  @error('customer_parent_account_number')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                  </div>
               
                  <div class="form-group"> 
                    <label>    الحساب الاب للموردين بالشجرة المحاسبية</label>
                    <select name="suppliers_parent_account_number" id="suppliers_parent_account_number" class="form-control ">
                      <option value="">اختر الحساب </option>
                      @if (@isset($parent_accounts) && !@empty($parent_accounts))
                     @foreach ($parent_accounts as $info )
                       <option @if(old('suppliers_parent_account_number')==$info->account_number) selected="selected" @endif value="{{ $info->account_number }}"> {{ $info->name }} </option>
                     @endforeach
                      @endif
                    </select>
                    @error('suppliers_parent_account_number')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>

              <div class="form-group">
                <label>رسالة تنبية اعلي الشاشة </label>
                <input name="general_alert" id="general_alert" class="form-control" value="{{ $data['general_alert'] }}" placeholder="ادخل اسم الشركة" oninvalid="setCustomValidity('من فضلك ادخل هذا الحقل')" onchange="try{setCustomValidity('')}catch(e){}" >
            </div>         

            <div class="form-group"  >
                <label>شعار الشركة</label>
            <div class="image">
           <img class="custom_img" src="{{ asset('assets/admin/uploads').'/'.$data['photo'] }}"  alt="لوجو الشركة">       
      <button type="button" class="btn btn-sm btn-danger" id="update_image">تغير الصورة</button>
      <button type="button" class="btn btn-sm btn-danger" style="display: none;" id="cancel_update_image"> الغاء</button>
     

       
            </div>
<div id="oldimage">
    
</div>


            </div>  

      <div class="form-group text-center">
<button type="submit" class="btn btn-primary btn-sm">حفظ التعديلات</button>
      </div>

    
    </form>  

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