import AppForm from '../app-components/Form/AppForm';

Vue.component('ejemplo-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                title:  '' ,
                slug:  '' ,
                perex:  '' ,
                published_at:  '' ,
                enabled:  false ,
                
            }
        }
    }

});