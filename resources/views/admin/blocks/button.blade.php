<div class="card card-body border-top-primary">		
    <div class="text-left">
        <button type="submit" name="btnSave" value="btnSave" class="btn btn-success btn-labeled btn-labeled-left ml-2"><b><i class="icon-add"></i></b> {{ __('form.button.save') }}</button>
        <button type="submit" name="btnSaveClose" value="btnSaveClose" class="btn bg-teal-400 btn-labeled btn-labeled-left"><b><i class="icon-add-to-list"></i></b> {{ __('form.button.saveclose') }}</button>
        <a href="{{ route($exit) }}" class="btn btn-danger btn-labeled btn-labeled-left"><b><i class="icon-close2"></i></b> {{ __('form.button.close') }}</a>
    </div>
</div>
