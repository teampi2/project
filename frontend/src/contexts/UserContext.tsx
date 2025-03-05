import * as React from 'react'

interface UserContextProps {
  user: IUser | null
  loading: boolean
  authenticated: boolean
  signin: (email: string, password: string) => Promise<void>
  signout: () => Promise<void>
}

export const UserContext = React.createContext({} as UserContextProps)
