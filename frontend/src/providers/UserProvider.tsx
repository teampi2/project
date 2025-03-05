import * as React from 'react'
import { UserContext } from '@/contexts/UserContext'
import * as cookies from '@/lib/cookies'
import api from '@/lib/axios'
import retrieveUser from '@/utils/retrieve-user'

interface UserProviderProps {
  children: React.ReactNode
}

export default function UserProvider({ children }: UserProviderProps) {
  const [user, setUser] = React.useState<IUser | null>(null)
  const [loading, setLoading] = React.useState(true)

  const authenticated = !!user

  const setCurrentUser = async () => {
    setLoading(true)
    const currentUser = await retrieveUser()
    setUser(currentUser)
    console.log(currentUser)
    setLoading(false)
  }

  React.useEffect(() => {
    setCurrentUser()
  }, [])

  const signin = async (email: string, password: string) => {
    setLoading(true)
    const response = await api.user.login({ email, password })
    cookies.setSession(response.data.token)
    setUser(response.data.user)
    console.log(response.data.user)
    setLoading(false)
  }

  const signout = async () => {
    cookies.removeSession()
    setUser(null)
  }

  return (
    <UserContext.Provider
      value={{ user, loading, authenticated, signin, signout }}
    >
      {children}
    </UserContext.Provider>
  )
}
