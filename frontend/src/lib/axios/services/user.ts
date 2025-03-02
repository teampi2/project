import config from '@/lib/axios/config'

export async function login(data: LoginRequest) {
  return config.post<LoginResponse>('/login', data)
}

export async function me() {
  return config.get<IUser>('/me')
}
