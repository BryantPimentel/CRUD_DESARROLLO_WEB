<div class="form-group row align-items-center" :class="{'has-danger': errors.has('marca'), 'has-success': fields.marca && fields.marca.valid }">
    <label for="marca" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.marca.columns.marca') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.marca" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('marca'), 'form-control-success': fields.marca && fields.marca.valid}" id="marca" name="marca" placeholder="{{ trans('admin.marca.columns.marca') }}">
        <div v-if="errors.has('marca')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('marca') }}</div>
    </div>
</div>


