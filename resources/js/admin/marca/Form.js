import AppForm from '../app-components/Form/AppForm';

Vue.component('marca-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                marca:  '' ,
                
            }
        }
    }

});