import axios from "axios"
import { ref } from "vue"


export default function useUser(){
    const savings = ref([])
    
    const getSavings = async () => {
        let response = await axios.get('/api/user/usersavings/')
        savings.value = response.data.data;
    }
    
    
    return {
        savings,
        getSavings
    }
}