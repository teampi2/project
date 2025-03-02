import axios from 'axios'
import * as cookies from '@/lib/cookies'

const config = axios.create({
  baseURL: 'http://localhost:8000/api',
})

config.interceptors.request.use(
  (config) => {
    const token = cookies.getSession()
    config.headers.Authorization = 'Bearer ' + token
    return config
  },
  (error) => {
    return Promise.reject(error)
  }
)

export default config
