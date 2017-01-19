<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Example Component</div>

                    <div class="panel-body">
                        I'm an example component!

                        <div class="message">
                            {{ message }}
                        </div>

                        <div>
                            <button v-on:click.prevent="showMessage">Click Me</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        data : function(){
            return {
                message : 'I am the default message.'
            }
        },

        methods : {

            showMessage : function(){

                this.message = 'I was replaced.';

            }

        },

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
