import api from '@/lib/axios'

export default async function retrieveUser() {
  try {
    const response = await api.user.me()
    return response.data
  } catch {
    return null
  }
}
