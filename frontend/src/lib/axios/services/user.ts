import config from '@/lib/axios/config'

export async function login(data: LoginRequest) {
  return config.post<LoginResponse>('/login', data)
}
