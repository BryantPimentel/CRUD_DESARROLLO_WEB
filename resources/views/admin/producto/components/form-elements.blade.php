<div class="form-group row align-items-center" :class="{'has-danger': errors.has('producto'), 'has-success': fields.producto && fields.producto.valid }">
    <label for="producto" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.producto.columns.producto') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.producto" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('producto'), 'form-control-success': fields.producto && fields.producto.valid}" id="producto" name="producto" placeholder="{{ trans('admin.producto.columns.producto') }}">
        <div v-if="errors.has('producto')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('producto') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('id_marca'), 'has-success': fields.id_marca && fields.id_marca.valid }">
    <label for="id_marca" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.producto.columns.id_marca') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.id_marca" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('id_marca'), 'form-control-success': fields.id_marca && fields.id_marca.valid}" id="id_marca" name="id_marca" placeholder="{{ trans('admin.producto.columns.id_marca') }}">
        <div v-if="errors.has('id_marca')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('id_marca') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('descripcion'), 'has-success': fields.descripcion && fields.descripcion.valid }">
    <label for="descripcion" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.producto.columns.descripcion') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <textarea class="form-control" v-model="form.descripcion" v-validate="''" id="descripcion" name="descripcion"></textarea>
        </div>
        <div v-if="errors.has('descripcion')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('descripcion') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('precio_costo'), 'has-success': fields.precio_costo && fields.precio_costo.valid }">
    <label for="precio_costo" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.producto.columns.precio_costo') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.precio_costo" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('precio_costo'), 'form-control-success': fields.precio_costo && fields.precio_costo.valid}" id="precio_costo" name="precio_costo" placeholder="{{ trans('admin.producto.columns.precio_costo') }}">
        <div v-if="errors.has('precio_costo')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('precio_costo') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('precio_venta'), 'has-success': fields.precio_venta && fields.precio_venta.valid }">
    <label for="precio_venta" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.producto.columns.precio_venta') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.precio_venta" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('precio_venta'), 'form-control-success': fields.precio_venta && fields.precio_venta.valid}" id="precio_venta" name="precio_venta" placeholder="{{ trans('admin.producto.columns.precio_venta') }}">
        <div v-if="errors.has('precio_venta')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('precio_venta') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('existencia'), 'has-success': fields.existencia && fields.existencia.valid }">
    <label for="existencia" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.producto.columns.existencia') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.existencia" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('existencia'), 'form-control-success': fields.existencia && fields.existencia.valid}" id="existencia" name="existencia" placeholder="{{ trans('admin.producto.columns.existencia') }}">
        <div v-if="errors.has('existencia')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('existencia') }}</div>
    </div>
</div>


