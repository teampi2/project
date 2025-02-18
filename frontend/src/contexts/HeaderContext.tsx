import * as React from 'react'

interface HeaderContextProps {
  openMenu: boolean
  handleToggleMenu: () => void
}

export const HeaderContext = React.createContext({} as HeaderContextProps)
