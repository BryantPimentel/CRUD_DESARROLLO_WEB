@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.marca.actions.edit', ['name' => $marca->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <marca-form
                :action="'{{ $marca->resource_url }}'"
                :data="{{ $marca->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.marca.actions.edit', ['name' => $marca->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.marca.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </marca-form>

        </div>
    
</div>

@endsection