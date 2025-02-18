import * as React from 'react'
import { HeaderContext } from '@/contexts/HeaderContext'

interface HeaderProviderProps {
  children: React.ReactNode
}

export default function HeaderProvider({ children }: HeaderProviderProps) {
  const [openMenu, setOpenMenu] = React.useState(false)

  const handleToggleMenu = () => {
    setOpenMenu(!openMenu)
  }

  return (
    <HeaderContext.Provider value={{ openMenu, handleToggleMenu }}>
      {children}
    </HeaderContext.Provider>
  )
}
