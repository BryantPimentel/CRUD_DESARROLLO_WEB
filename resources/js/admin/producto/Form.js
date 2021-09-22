import AppForm from '../app-components/Form/AppForm';

Vue.component('producto-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                producto:  '' ,
                id_marca:  '' ,
                descripcion:  '' ,
                precio_costo:  '' ,
                precio_venta:  '' ,
                existencia:  '' ,
                
            }
        }
    }

});