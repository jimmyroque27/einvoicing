                    <form  method="POST" action="{{route('taxpayers.store')}}">
                        @csrf
                        <input type="hidden" name ="TaxType" value="2"/>
                        <div class="form-group row  m-0 p-0">
                            <div class="col-sm-12 m-0 p-0 ">

                                <div class="form-check small  ">
                                    <input class="form-check-input "  id="PrivateGov1" type="radio" name="PrivateGov" checked>
                                    <label class="form-check-label" for="PrivateGov1">Private</label>
                                
                                    <input class="form-check-input ml-2" id="PrivateGov2" type="radio" name="PrivateGov" >
                                    <label class="form-check-label pl-4  " for="PrivateGov2">Government</label>
                                </div>
                                
                                @error('PrivateGov')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            {{-- Business Details --}}
                            <div class="col-sm-6 m-0 p-2">
                                {{-- Registered Name --}}
                                <div class="form-group row  m-0 p-0">
                                    <div class="col-sm-12 m-0 p-0">
                                        
                                        <label for="RegNm" class="col-sm-12 pl-1">
                                            <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">Registered Name<span style="color:red;">*</span> </span> 
                                        </label>
                                        <input 
                                            type="text" 
                                            class="form-control mt-n3 form-control-user rounded-0 @error('RegNm') is-invalid @enderror" 
                                            id="RegNm"
                                            placeholder="" 
                                            name="RegNm" 
                                            value="{{ old('RegNm') }}">
                
                                        @error('RegNm')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                     
                                </div>
                                {{-- TIN/Branch/Birth Date --}}
                                <div class="form-group row  m-0 p-0">
                                    <div class="col-sm-6 m-0 p-0 pr-1">
                                        
                                        <label for="Tin" class="col-sm-12 pl-1">
                                            <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">TIN<span style="color:red;">*</span> </span> 
                                        </label>
                                        <input 
                                            type="text" 
                                            class="form-control intNumber mt-n3 form-control-user rounded-0 @error('Tin') is-invalid @enderror" 
                                            id="Tin"
                                            placeholder="" 
                                            maxlength="9"
                                            name="Tin" 
                                            value="{{ old('Tin') }}">
                
                                        @error('Tin')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 m-0 p-0 pr-1">
                                        
                                        <label for="BranchCd" class="col-sm-12 pl-1">
                                            <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">Branch Code  </span> 
                                        </label>
                                        <input 
                                            type="text" 
                                            class="form-control mt-n3 form-control-user rounded-0 @error('BranchCd') is-invalid @enderror" 
                                            id="BranchCd"
                                            placeholder="" 
                                            name="BranchCd" 
                                            value="{{ old('BranchCd') }}">
                
                                        @error('BranchCd')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    
                                     
                                </div>
                                {{-- SEC --}}
                                <div class="form-group row  m-0 p-0 ">
                                    <div class="col-sm-8 m-0 p-0  pr-1">
                                        
                                        <label for="DtiSecRegNo" class="col-sm-12 pl-1">
                                            <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">SEC Registration No. <span style="color:red;">*</span> </span> 
                                        </label>
                                        <input 
                                            type="text" 
                                            class="form-control mt-n3 form-control-user rounded-0 @error('DtiSecRegNo') is-invalid @enderror" 
                                            id="DtiSecRegNo"
                                            placeholder="" 
                                            name="DtiSecRegNo" 
                                            value="{{ old('DtiSecRegNo') }}">
                
                                        @error('DtiSecRegNo')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4  m-0 p-0 ">
                                        
                                        <label for="DtiSecRegDate" class="col-sm-12 pl-1">
                                            <span class="h6 small bg-white text-muted   pt-1 pl-1 pr-1">SEC Registration Date<span style="color:red;">*</span> </span> 
                                        </label>
                                        <input 
                                            type="date" 
                                            class="form-control mt-n3 form-control-user rounded-0 @error('DtiSecRegDate') is-invalid @enderror" 
                                            id="DtiSecRegDate"
                                            placeholder="" 
                                            name="DtiSecRegDate" 
                                            value="{{ old('DtiSecRegDate') }}"
                                             >
                
                                        @error('DtiSecRegDate')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                     
                                </div>
                                {{-- COR --}}
                                <div class="form-group row  m-0 p-0 ">
                                    <div class="col-sm-8 m-0 p-0  pr-1">
                                        
                                        <label for="CorOcn" class="col-sm-12 pl-1">
                                            <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">COR OCN<span style="color:red;">*</span> </span> 
                                        </label>
                                        <input 
                                            type="text" 
                                            class="form-control mt-n3 form-control-user rounded-0 @error('CorOcn') is-invalid @enderror" 
                                            id="CorOcn"
                                            placeholder="" 
                                            name="CorOcn" 
                                            value="{{ old('CorOcn') }}">
                
                                        @error('CorOcn')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4  m-0 p-0 ">
                                        
                                        <label for="CorDate" class="col-sm-12 pl-1">
                                            <span class="h6 small bg-white text-muted   pt-1 pl-1 pr-1">COR Issued Date<span style="color:red;">*</span> </span> 
                                        </label>
                                        <input 
                                            type="date" 
                                            class="form-control mt-n3 form-control-user rounded-0 @error('CorDate') is-invalid @enderror" 
                                            id="CorDate"
                                            placeholder="" 
                                            name="CorDate" 
                                            value="{{ old('CorDate') }}"
                                             >
                
                                        @error('CorDate')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                     
                                </div>
                                
                                {{-- Industries/Registered Activities --}}
                                <div class="form-group row  m-0 p-0 ">
                                    <div class="col-sm-8 m-0 p-0  pr-1">
                                        
                                        <label for="Industry" class="col-sm-12 pl-1">
                                            <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">Line of Business / Industries<span style="color:red;">*</span> </span> 
                                        </label>
                                        <input 
                                            type="text" 
                                            class="form-control mt-n3 form-control-user rounded-0 @error('Industry') is-invalid @enderror" 
                                            id="Industry"
                                            placeholder="" 
                                            name="Industry" 
                                            value="{{ old('Industry') }}">
                
                                        @error('Industry')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4  m-0 p-0 ">
                                        
                                        <label for="RegActivities" class="col-sm-12 pl-1">
                                            <span class="h6 small bg-white text-muted   pt-1 pl-1 pr-1">Registered Activities<span style="color:red;">*</span> </span> 
                                        </label>
                                        <input 
                                            type="text" 
                                            class="form-control mt-n3 form-control-user rounded-0 @error('RegActivities') is-invalid @enderror" 
                                            id="RegActivities"
                                            placeholder="" 
                                            name="RegActivities" 
                                             >
                
                                        @error('RegActivities')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                     
                                </div>
                                {{-- Business/Trade Name --}}
                                <div class="form-group row  m-0 p-0 ">
                                    <div class="col-sm-12 m-0 p-0  pr-1">
                                        
                                        <label for="BusinessNm" class="col-sm-12 pl-1">
                                            <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">Business / Trade Name<span style="color:red;">*</span> </span> 
                                        </label>
                                        <input 
                                            type="text" 
                                            class="form-control mt-n3 form-control-user rounded-0 @error('BusinessNm') is-invalid @enderror" 
                                            id="BusinessNm"
                                            placeholder="" 
                                            name="BusinessNm" 
                                            value="{{ old('BusinessNm') }}">
                
                                        @error('BusinessNm')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                     
                                     
                                </div>
                                 {{-- Registered as Branch --}}
                                 <div class="form-group row  m-0 p-0  ">
                                    <div class="col-sm-12 m-0 p-0">
                                        
                                        <div class="form-check small m-0 p-0 pt-2">
                                            
                                            <label class="form-check-label" for="RegBranch">
                                                Registered as Branch?
                                            </label>
                                            <input class="form-check-input ml-3 " type="checkbox" value="" id="RegBranch">
                                              
                                        </div>
                                        @error('RegBranch')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                     
                                     
                                </div>
                            </div>

                            {{-- Address / Contact Details --}}
                            <div class="col-sm-6 m-0 p-2">
                                {{-- Address1 --}}
                                <div class="form-group row  m-0 p-0 ">
                                    <div class="col-sm-12 m-0 p-0">
                                        
                                        <label for="Address1" class="col-sm-12 pl-1">
                                            <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">Address Line 1<span style="color:red;">*</span> </span> 
                                        </label>
                                        <input 
                                            type="text" 
                                            class="form-control mt-n3 form-control-user rounded-0 @error('Address1') is-invalid @enderror" 
                                            id="Address1"
                                            placeholder="" 
                                            name="Address1" 
                                            value="{{ old('Address1') }}">
                
                                        @error('Address1')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- Address2 --}}
                                <div class="form-group row  m-0 p-0 ">
                                    <div class="col-sm-12 m-0 p-0">
                                        
                                        <label for="Address2" class="col-sm-12 pl-1">
                                            <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">Address Line 2  </span> 
                                        </label>
                                        <input 
                                            type="text" 
                                            class="form-control mt-n3 form-control-user rounded-0 @error('Address2') is-invalid @enderror" 
                                            id="Address2"
                                            placeholder="" 
                                            name="Address2" 
                                            value="{{ old('Address2') }}">
                
                                        @error('Address2')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- brgy/district/city --}}
                                <div class="form-group row  m-0 p-0 ">
                                    <div class="col-sm-4 m-0 p-0">
                                        
                                        <label for="Barangay" class="col-sm-12 pl-1">
                                            <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">Barangay<span style="color:red;">*</span> </span> 
                                        </label>
                                        <input 
                                            type="text" 
                                            class="form-control mt-n3 form-control-user rounded-0 @error('Barangay') is-invalid @enderror" 
                                            id="Barangay"
                                            placeholder="" 
                                            name="Barangay" 
                                            value="{{ old('Barangay') }}">
                
                                        @error('Barangay')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4 m-0 p-0">
                                        
                                        <label for="District" class="col-sm-12 pl-1">
                                            <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">District<span style="color:red;">*</span> </span> 
                                        </label>
                                        <input 
                                            type="text" 
                                            class="form-control mt-n3 form-control-user rounded-0 @error('District') is-invalid @enderror" 
                                            id="District"
                                            placeholder="" 
                                            name="District" 
                                            value="{{ old('District') }}">
                
                                        @error('District')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4 m-0 p-0">
                                        
                                        <label for="City" class="col-sm-12 pl-1">
                                            <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">Town/City<span style="color:red;">*</span> </span> 
                                        </label>
                                        <input 
                                            type="text" 
                                            class="form-control mt-n3 form-control-user rounded-0 @error('City') is-invalid @enderror" 
                                            id="City"
                                            placeholder="" 
                                            name="City" 
                                            value="{{ old('City') }}">
                
                                        @error('City')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- province / zip code --}}
                                <div class="form-group row  m-0 p-0 ">
                                    <div class="col-sm-8 m-0 p-0">
                                        
                                        <label for="Province" class="col-sm-12 pl-1">
                                            <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">Province<span style="color:red;">*</span> </span> 
                                        </label>
                                        <input 
                                            type="text" 
                                            class="form-control mt-n3 form-control-user rounded-0 @error('Province') is-invalid @enderror" 
                                            id="Province"
                                            placeholder="" 
                                            name="Province" 
                                            value="{{ old('Province') }}">
                
                                        @error('Province')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4 m-0 p-0">
                                        
                                        <label for="ZipCode" class="col-sm-12 pl-1">
                                            <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">Zip Code<span style="color:red;">*</span> </span> 
                                        </label>
                                        <input 
                                            type="text" 
                                            class="form-control mt-n3 form-control-user rounded-0 @error('ZipCode') is-invalid @enderror" 
                                            id="ZipCode"
                                            placeholder="" 
                                            name="ZipCode" 
                                            value="{{ old('ZipCode') }}">
                
                                        @error('ZipCode')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                     
                                </div>
                                {{-- Business Email / Contacts --}}
                                <div class="form-group row  m-0 p-0 ">
                                    <div class="col-sm-6 m-0 p-0">
                                        
                                        <label for="Email" class="col-sm-12 pl-1">
                                            <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">Business E-mail Address<span style="color:red;">*</span> </span> 
                                        </label>
                                        <input 
                                            type="text" 
                                            class="form-control mt-n3 form-control-user rounded-0 @error('Email') is-invalid @enderror" 
                                            id="Email"
                                            placeholder="" 
                                            name="Email" 
                                            value="{{ old('Email') }}">
                
                                        @error('Email')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 m-0 p-0">
                                        
                                        <label for="ContactNo" class="col-sm-12 pl-1">
                                            <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">Contact Number<span style="color:red;">*</span> </span> 
                                        </label>
                                        <input 
                                            type="text" 
                                            class="form-control mt-n3 form-control-user rounded-0 @error('ContactNo') is-invalid @enderror" 
                                            id="ContactNo"
                                            placeholder="" 
                                            name="ContactNo" 
                                            value="{{ old('ContactNo') }}">
                
                                        @error('ContactNo')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                     
                                </div>
                                {{-- RDO --}}
                                <div class="form-group row  m-0 p-0 ">
                                    <div class="col-sm-4 m-0 p-0">
                                        
                                        <label for="RDO" class="col-sm-12 pl-1">
                                            <span class="h6 small bg-white text-muted pt-1 pl-1 pr-1">RDO<span style="color:red;">*</span> </span> 
                                        </label>
                                        <input 
                                            type="text" 
                                            class="form-control mt-n3 form-control-user rounded-0 @error('RDO') is-invalid @enderror" 
                                            id="RDO"
                                            placeholder="" 
                                            name="RDO" 
                                            value="{{ old('RDO') }}">
                
                                        @error('RDO')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4 m-0 p-0 ">

                                        <div class="form-check small ml-2 mt-4">
                                            <input class="form-check-input " id="CalFiscal1" type="radio" name="CalFiscal" checked>
                                            <label class="form-check-label" for="CalFiscal1">Calendar</label>
                                         
                                            <input class="form-check-input ml-2" id="CalFiscal2" type="radio" name="CalFiscal" >
                                            <label class="form-check-label pl-4  " for="CalFiscal2">Fiscal</label>
                                        </div>
                                         
                                        @error('CalFiscal')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-3 m-0 p-0 mt-3 text-right">
                                        <label for="FiscalEnd" class="col-sm-12 pl-1">
                                            <span class="h6 small bg-white text-muted pt-2 pl-1 pr-1">Fiscal End</span> </span> 
                                        </label>
                                    </div>
                                    <div class="col-sm-1 m-0 p-0  mt-3 ">
                                        <select class="form-control h6  m-0   p-1   rounded-0"  name="FiscalEnd">
                                            <option value="01" selected>01</option>
                                            <option value="02">02</option>
                                            <option value="03">03</option>
                                            <option value="04">04</option>
                                            <option value="05">05</option>
                                            <option value="06">06</option>
                                            <option value="07">07</option>
                                            <option value="08">08</option>
                                            <option value="09">09</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                        </select> 
                                         
                                        @error('FiscalEnd')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                     
                                </div>
                                
                               {{-- VAT Type --}}
                               <div class="form-group row  m-0 p-0 pt-2 ">
                                    <div class="col-sm-2 m-0 p-0   pt-1 ">
                                        <label for="VatType" class="col-sm-12 pl-1">
                                            <span class="h6 small bg-white text-muted pt-2 pl-1 pr-1">VAT Type</span> </span> 
                                        </label>
                                    </div>
                                    <div class="col-sm-4 m-0 p-0 ">

                                        
                                        <select class="form-control h6  m-0   p-1   rounded-0"  name="VatType">
                                            <option value="0" selected>VAT Registered</option>
                                            <option value="1">Non-VAT Registered</option>
                                            
                                        </select> 
                                        
                                        @error('VatType')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            
                            </div>
                            
                        </div>  
        
                        
                        {{-- Save Button --}}
                        <button type="submit" class="btn btn-success btn-user btn-block">
                            Save
                        </button>
        
                    </form>  