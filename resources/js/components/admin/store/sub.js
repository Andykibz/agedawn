import store from '../store'

store.subscribe((mutation)=>{
    switch(mutation.type){
        case 'auth/SET_TOKEN':
            if( mutation.payload ){
                axios.defaults.headers.common['Authorization'] = `Bearer ${mutation.payload}`
                localStorage.setItem('adawnage.token',mutation.payload)
            }else{
                axios.defaults.headers.common['Authorization'] = null
                localStorage.removeItem('adawnage.token')
            }
            break;
            
    }
});