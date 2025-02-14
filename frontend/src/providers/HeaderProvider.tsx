import * as React from 'react'
import { HeaderContext } from '@/contexts/HeaderContext'

interface HeaderProviderProps {
  children: React.ReactNode
}

export default function HeaderProvider({ children }: HeaderProviderProps) {
  const [menu, setMenu] = React.useState(false)

  const toggleMenu = () => {
    setMenu(!menu)
  }

  return (
    <HeaderContext.Provider value={{ menu, toggleMenu }}>
      {children}
    </HeaderContext.Provider>
  )
}
