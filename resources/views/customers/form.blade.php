<div class="form-group">
    <label>Name:</label>
    <input type="text" name="name" value="{{ old('name') ?? $customer->name }}" class="form-control">
    {{ $errors->first('name') }}
</div>

<div class="form-group">
    <label>Email:</label>
    <input type="text" name="email" value="{{ old('email') ?? $customer->email }}" class="form-control">
    {{ $errors->first('email') }}
</div>

<div class="form-group">
    <label for="active">Status:</label>
    <select name="active" id="active" class="form-control">
        <option value="" disabled>Select customer status</option>

        @foreach($customer->activeOptions() as $key => $option)
            <option value="{{$key}}" {{ $customer->active === $option ? 'selected' : ''}}>{{$option}}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="company_id">Company:</label>
    <select name="company_id" id="company_id" class="form-control">
        @foreach($companies as $company)
            <option value="{{ $company->id }}" {{ ($company->id === $customer->getCompanyId()) ? 'selected' : '' }}>
                {{ $company->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group d-flex flex-column">
    <label for="image">Profile Image</label>
    <input type="file" name="image" class="pb-3">
    {{ $errors->first('image') }}
</div>
@csrf
