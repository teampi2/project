import * as React from 'react'

interface HeaderContextProps {
  menu: boolean
  toggleMenu: () => void
}

export const HeaderContext = React.createContext({} as HeaderContextProps)
