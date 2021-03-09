<template>
    <div>
        <div class="text-center">
            <qrcode-stream @decode="onDecode" @init="onInit" v-if="QRCode"/>
            <p class="error">{{ error }}</p>
            <!-- <p class="decode-result">Last result: <b>{{ result }}</b></p> -->

            <button class="btn btn-primary" v-on:click="showQRCode">Scan QR Code</button>
            <p class="h4 my-2">OR</p>
            <div class="form-group row">
                <input type="text" class="form-control col-lg-4 offset-lg-4 col-sm-12" placeholder="Enter Employee ID">
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data () {
            return {
                result: '',
                error: '',
                QRCode: false
            }
        },

        methods: {
            showQRCode: function() {
                this.QRCode = true;
                this.result = '';
            },
            onDecode (result) {
                    this.QRCode = false;
                    this.result = result;
                },

            async onInit (promise) {
            try {
                await promise
                } catch (error) {
                    if (error.name === 'NotAllowedError') {
                    this.error = "ERROR: you need to grant camera access permisson"
                    } else if (error.name === 'NotFoundError') {
                    this.error = "ERROR: no camera on this device"
                    } else if (error.name === 'NotSupportedError') {
                    this.error = "ERROR: secure context required (HTTPS, localhost)"
                    } else if (error.name === 'NotReadableError') {
                    this.error = "ERROR: is the camera already in use?"
                    } else if (error.name === 'OverconstrainedError') {
                    this.error = "ERROR: installed cameras are not suitable"
                    } else if (error.name === 'StreamApiNotSupportedError') {
                    this.error = "ERROR: Stream API is not supported in this browser"
                    }
                }
            }
        }
    }
</script>
